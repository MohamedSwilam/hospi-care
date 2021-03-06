<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\IndexResponse;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\RoleTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Role::class);

        return ResponseFacade::indexRespond(
            fractal(
                (new IndexResponse(Role::where('name', '!=', 'super_admin')))->execute(),
                new RoleTransformer()
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('store', Role::class);

        $role_data = $data = $request->validated();

        unset($role_data['permissions']);

        $role = Role::create($role_data);

        if (array_key_exists('permissions', $data)){
            foreach ($data['permissions'] as $permission){
                $role->givePermissionTo($permission);
            }
        }

        return ResponseFacade::createRespond(
            fractal(
                Role::where('id', $role->id)
                    ->with('permissions')
                    ->first(),
                new RoleTransformer()
            )
        );
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('show', [Role::class, $id]);

        return ResponseFacade::showRespond(
            fractal(
                Role::where('id', $id)
                    ->with('permissions')
                    ->first(),
                new RoleTransformer()
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(RoleRequest $request, $id)
    {
        $this->authorize('update', Role::class);

        $role = Role::findById($id);

        $role_data = $data = $request->validated();

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $role->revokePermissionTo($permission['name']);
        }

        unset($role_data['permissions']);

        $role->update($role_data);

        if (array_key_exists('permissions', $data)){
            foreach ($data['permissions'] as $permission){
                $role->givePermissionTo($permission);
            }
        }

        return ResponseFacade::updateRespond(
            fractal($role, new RoleTransformer())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('destroy', Role::class);

        Role::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
