<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
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
        return request()->user()->hasPermissionTo('browse-testimonial');
    }

    public function store()
    {
        return request()->user()->hasPermissionTo('create-testimonial');
    }

    public function show()
    {
        return request()->user()->hasPermissionTo('view-testimonial');
    }

    public function update()
    {
        return request()->user()->hasPermissionTo('edit-testimonial');
    }

    public function destroy()
    {
        return request()->user()->hasPermissionTo('delete-testimonial');
    }
}
