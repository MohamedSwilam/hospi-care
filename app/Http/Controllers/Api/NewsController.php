<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\IndexResponse;
use App\Models\File;
use App\Models\News;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\NewsTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', News::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(News::query()))->execute(), new NewsTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(NewsRequest $request)
    {
        $this->authorize('store', News::class);

        $data = $request->validated();

        $photoFile = array();
        $photoFile['file_name'] = download_file($data['photo'], 'storage/news/images');
        $photoFile['url'] = '/storage/news/images/'.$photoFile['file_name'];
        $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
        $savedPhoto = File::create($photoFile);
        $data['photo_id'] = $savedPhoto->id;

        $news = News::create($data);

        return ResponseFacade::createRespond(
            fractal(News::where('id', $news->id)->first(), new NewsTransformer())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('show', News::class);
        return ResponseFacade::showRespond(
            fractal(News::where('id', $id)->first(), new NewsTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(NewsRequest $request, $id)
    {
        $this->authorize('update', News::class);

        $data = $request->validated();

        if (key_exists('photo', $data)) {
            $photoFile = array();
            $photoFile['file_name'] = download_file($data['photo'], 'storage/news/images');
            $photoFile['url'] = '/storage/news/images/'.$photoFile['file_name'];
            $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
            $savedPhoto = File::create($photoFile);
            $data['photo_id'] = $savedPhoto->id;
        }

        $news = News::find($id);

        $news->update($data);

        return ResponseFacade::updateRespond(
            fractal(News::where('id' , $id)->first(), new NewsTransformer())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('destroy', News::class);

        News::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
