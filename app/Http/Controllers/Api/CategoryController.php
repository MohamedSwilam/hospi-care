<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\IndexResponse;
use App\Models\Category;
use App\Models\File;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\CategoryTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Category::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(Category::query()))->execute(), new CategoryTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('store', Category::class);

        $data = $request->validated();

        $photoFile = array();
        $photoFile['file_name'] = download_file($data['photo'], 'storage/categories/images');
        $photoFile['url'] = '/storage/categories/images/'.$photoFile['file_name'];
        $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
        $savedPhoto = File::create($photoFile);
        $data['photo_id'] = $savedPhoto->id;

        $category = Category::create($data);

        return ResponseFacade::createRespond(
            fractal(Category::where('id', $category->id)->first(), new CategoryTransformer())
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
        $this->authorize('show', Category::class);
        return ResponseFacade::showRespond(
            fractal(Category::where('id', $id)->first(), new CategoryTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->authorize('update', Category::class);

        $data = $request->validated();

        if (key_exists('photo', $data)) {
            $photoFile = array();
            $photoFile['file_name'] = download_file($data['photo'], 'storage/categories/images');
            $photoFile['url'] = '/storage/categories/images/'.$photoFile['file_name'];
            $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
            $savedPhoto = File::create($photoFile);
            $data['photo_id'] = $savedPhoto->id;
        }

        $category = Category::find($id);

        $category->update($data);

        return ResponseFacade::updateRespond(
            fractal(Category::where('id' , $id)->first(), new CategoryTransformer())
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
        $this->authorize('destroy', Category::class);

        Category::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
