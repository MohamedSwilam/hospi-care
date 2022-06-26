<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
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
        return request()->user()->hasPermissionTo('browse-news');
    }

    public function store()
    {
        return request()->user()->hasPermissionTo('create-news');
    }

    public function show()
    {
        return request()->user()->hasPermissionTo('view-news');
    }

    public function update()
    {
        return request()->user()->hasPermissionTo('edit-news');
    }

    public function destroy()
    {
        return request()->user()->hasPermissionTo('delete-news');
    }
}
