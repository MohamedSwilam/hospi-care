<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPhotoRequest;
use App\IndexResponse;
use App\Models\ProductPhoto;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\ProductPhotoTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', ProductPhoto::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(ProductPhoto::query()))->execute(), new ProductPhotoTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductPhotoRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ProductPhotoRequest $request)
    {
        $this->authorize('store', ProductPhoto::class);

        $data = $request->validated();

        foreach ($data['photos'] as $photo){
            $photoInfo = array();
            $photoInfo['file_name'] = download_file($photo, 'storage/products/images');
            $photoInfo['url'] = '/storage/products/images/'.$photoInfo['file_name'];
            $photoInfo['file_extension'] = $photo->getClientOriginalExtension();
            $photoInfo['product_id'] = $data['product_id'];
            ProductPhoto::create($photoInfo);
        }

        return ResponseFacade::createRespond();
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
        $this->authorize('show', ProductPhoto::class);
        return ResponseFacade::showRespond(
            fractal(ProductPhoto::where('id', $id)->first(), new ProductPhotoTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductPhotoRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ProductPhotoRequest $request, $id)
    {
        $this->authorize('update', ProductPhoto::class);

        $data = $request->validated();

        if (key_exists('photo', $data)) {
            $data['file_name'] = download_file($data['photo'], 'storage/products/images');
            $data['url'] = '/storage/products/images/'.$data['file_name'];
            $data['file_extension'] = $data['photo']->getClientOriginalExtension();
        }

        $productPhoto = ProductPhoto::find($id);

        $productPhoto->update($data);

        return ResponseFacade::updateRespond(
            fractal(ProductPhoto::where('id' , $id)->first(), new ProductPhotoTransformer())
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
        $this->authorize('destroy', ProductPhoto::class);

        ProductPhoto::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
