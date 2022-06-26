<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPhotoPolicy
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
        return request()->user()->hasPermissionTo('browse-product-photo');
    }

    public function store()
    {
        return request()->user()->hasPermissionTo('create-product-photo');
    }

    public function show()
    {
        return request()->user()->hasPermissionTo('view-product-photo');
    }

    public function update()
    {
        return request()->user()->hasPermissionTo('edit-product-photo');
    }

    public function destroy()
    {
        return request()->user()->hasPermissionTo('delete-product-photo');
    }
}
