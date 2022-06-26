<?php

namespace App\Transformers;

use App\Models\ProductPhoto;
use League\Fractal\TransformerAbstract;

class ProductPhotoTransformer extends TransformerAbstract
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
     * @param ProductPhoto $productPhoto
     * @return array
     */
    public function transform(ProductPhoto $productPhoto)
    {
        return $productPhoto->toArray();
    }
}
