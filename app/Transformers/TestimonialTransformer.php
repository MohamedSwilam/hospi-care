<?php

namespace App\Transformers;

use App\Models\Testimonial;
use League\Fractal\TransformerAbstract;

class TestimonialTransformer extends TransformerAbstract
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
     * @param Testimonial $testimonial
     * @return array
     */
    public function transform(Testimonial $testimonial)
    {
        return $testimonial->toArray();
    }
}
