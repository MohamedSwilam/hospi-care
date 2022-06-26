<?php

namespace App\Transformers;

use App\Models\Site;
use League\Fractal\TransformerAbstract;

class SiteTransformer extends TransformerAbstract
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
     * @param Site $site
     * @return array
     */
    public function transform(Site $site)
    {
        return $site->toArray();
    }
}
