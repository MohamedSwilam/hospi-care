<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
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
        return request()->user()->hasPermissionTo('browse-slider');
    }

    public function store()
    {
        return request()->user()->hasPermissionTo('create-slider');
    }

    public function show()
    {
        return request()->user()->hasPermissionTo('view-slider');
    }

    public function update()
    {
        return request()->user()->hasPermissionTo('edit-slider');
    }

    public function destroy()
    {
        return request()->user()->hasPermissionTo('delete-slider');
    }
}
