<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetailRequest;
use App\IndexResponse;
use App\Models\ProductDetail;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\ProductDetailTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', ProductDetail::class);

        return ResponseFacade::indexRespond(
            fractal((new IndexResponse(ProductDetail::query()))->execute(), new ProductDetailTransformer())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductDetailRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ProductDetailRequest $request)
    {
        $this->authorize('store', ProductDetail::class);

        $data = $request->validated();

        $ProductDetail = ProductDetail::create($data);

        return ResponseFacade::createRespond(
            fractal(ProductDetail::where('id', $ProductDetail->id)->first(), new ProductDetailTransformer())
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
        $this->authorize('show', ProductDetail::class);
        return ResponseFacade::showRespond(
            fractal(ProductDetail::where('id', $id)->first(), new ProductDetailTransformer())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductDetailRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ProductDetailRequest $request, $id)
    {
        $this->authorize('update', ProductDetail::class);

        $data = $request->validated();

        $category = ProductDetail::find($id);

        $category->update($data);

        return ResponseFacade::updateRespond(
            fractal(ProductDetail::where('id' , $id)->first(), new ProductDetailTransformer())
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
        $this->authorize('destroy', ProductDetail::class);

        ProductDetail::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
