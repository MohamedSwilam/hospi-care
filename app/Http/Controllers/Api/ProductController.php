<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\IndexResponse;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductPhoto;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\ProductTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Product::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(Product::query()))->execute(), new ProductTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('store', Product::class);

        $data = $request->validated();

        $product = Product::create($data);

        foreach ($data['photos'] as $photo){
            $photoInfo = array();
            $photoInfo['file_name'] = download_file($photo, 'storage/products/images');
            $photoInfo['url'] = '/storage/products/images/'.$photoInfo['file_name'];
            $photoInfo['file_extension'] = $photo->getClientOriginalExtension();
            $photoInfo['product_id'] = $product->id;
            ProductPhoto::create($photoInfo);
        }

        foreach ($data['details'] as $productDetail){
            $productDetail['product_id'] = $product->id;
            ProductDetail::create($productDetail);
        }

        return ResponseFacade::createRespond(
            fractal(Product::where('id', $product->id)->first(), new ProductTransformer())
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
        $this->authorize('show', Product::class);
        return ResponseFacade::showRespond(
            fractal(Product::where('id', $id)->first(), new ProductTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ProductRequest $request, $id)
    {
        $this->authorize('update', Product::class);

        $data = $request->validated();

        $category = Product::find($id);

        $category->update($data);

        return ResponseFacade::updateRespond(
            fractal(Product::where('id' , $id)->first(), new ProductTransformer())
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
        $this->authorize('destroy', Product::class);

        Product::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
