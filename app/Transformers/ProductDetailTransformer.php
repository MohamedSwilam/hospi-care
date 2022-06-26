<?php

namespace App\Transformers;

use App\Models\ProductDetail;
use League\Fractal\TransformerAbstract;

class ProductDetailTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param ProductDetail $productDetail
     * @return array
     */
    public function transform(ProductDetail $productDetail)
    {
        return $productDetail->toArray();
    }
}
