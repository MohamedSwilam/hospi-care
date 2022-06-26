<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
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
        return request()->user()->hasPermissionTo('browse-site');
    }

    public function store()
    {
        return request()->user()->hasPermissionTo('create-site');
    }

    public function show()
    {
        return request()->user()->hasPermissionTo('view-site');
    }

    public function update()
    {
        return request()->user()->hasPermissionTo('edit-site');
    }

    public function destroy()
    {
        return request()->user()->hasPermissionTo('delete-site');
    }
}
