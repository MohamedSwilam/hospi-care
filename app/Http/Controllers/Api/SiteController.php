<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\IndexResponse;
use App\Models\File;
use App\Models\Site;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\SiteTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Site::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(Site::query()))->execute(), new SiteTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SiteRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(SiteRequest $request)
    {
        $this->authorize('store', Site::class);

        $data = $request->validated();

        $photoFile = array();
        $photoFile['file_name'] = download_file($data['photo'], 'storage/sites/images');
        $photoFile['url'] = '/storage/sites/images/'.$photoFile['file_name'];
        $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
        $savedPhoto = File::create($photoFile);
        $data['photo_id'] = $savedPhoto->id;

        $catalogFile = array();
        $catalogFile['file_name'] = download_file($data['catalog'], 'storage/sites/catalogs');
        $catalogFile['url'] = '/storage/sites/catalogs/'.$catalogFile['file_name'];
        $catalogFile['file_extension'] = $data['catalog']->getClientOriginalExtension();
        $savedCatalog = File::create($catalogFile);
        $data['catalog_file_id'] = $savedCatalog->id;

        $site = Site::create($data);

        return ResponseFacade::createRespond(
            fractal(Site::where('id', $site->id)->first(), new SiteTransformer())
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
        $this->authorize('show', Site::class);
        return ResponseFacade::showRespond(
            fractal(Site::where('id', $id)->first(), new SiteTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SiteRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(SiteRequest $request, $id)
    {
        $this->authorize('update', Site::class);

        $data = $request->validated();

        if (key_exists('photo', $data)) {
            $photoFile = array();
            $photoFile['file_name'] = download_file($data['photo'], 'storage/sites/images');
            $photoFile['url'] = '/storage/sites/images/'.$photoFile['file_name'];
            $photoFile['file_extension'] = $data['photo']->getClientOriginalExtension();
            $savedPhoto = File::create($photoFile);
            $data['photo_id'] = $savedPhoto->id;
        }

        if (key_exists('catalog', $data)) {
            $catalogFile = array();
            $catalogFile['file_name'] = download_file($data['catalog'], 'storage/sites/catalogs');
            $catalogFile['url'] = '/storage/sites/catalogs/'.$catalogFile['file_name'];
            $catalogFile['file_extension'] = $data['catalog']->getClientOriginalExtension();
            $savedCatalog = File::create($catalogFile);
            $data['catalog_file_id'] = $savedCatalog->id;
        }

        $site = Site::find($id);

        $site->update($data);

        return ResponseFacade::updateRespond(
            fractal(Site::where('id' , $id)->first(), new SiteTransformer())
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
        $this->authorize('destroy', Site::class);

        Site::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
