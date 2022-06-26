<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return request()->user()->hasPermissionTo('browse-product-detail');
    }

    public function store()
    {
        return request()->user()->hasPermissionTo('create-product-detail');
    }

    public function show()
    {
        return request()->user()->hasPermissionTo('view-product-detail');
    }

    public function update()
    {
        return request()->user()->hasPermissionTo('edit-product-detail');
    }

    public function destroy()
    {
        return request()->user()->hasPermissionTo('delete-product-detail');
    }
}
