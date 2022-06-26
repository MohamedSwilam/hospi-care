<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\IndexResponse;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\UserTransformer;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', User::class);

        return ResponseFacade::indexRespond(
            fractal(
                (new IndexResponse(User::with(['roles'])))->execute()
                , new UserTransformer()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(UserRequest $request)
    {
        $this->authorize('store', User::class);

        $data = $request->except('role');

        $data['email_verified_at'] = now();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $user->assignRole($request->role);

        return ResponseFacade::createRespond(
            fractal(
                User::where('id', $user->id)->with(['roles', 'roles.permissions', 'permissions'])->first(),
                new UserTransformer()
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
        $this->authorize('show', User::class);
        return ResponseFacade::showRespond(
            fractal(
                User::where('id', $id)
                    ->with('roles', 'permissions', 'roles.permissions')
                ->first(),
                new UserTransformer()
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UserRequest $request, $id)
    {
        $this->authorize('update', User::class);

        $user = User::find($id);
        $data = $request->except('role');

        if ($request->password){
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        if ($request->role){
            $user->syncRoles($request->role);
        }

        return ResponseFacade::updateRespond(
            fractal(
                User::where('id', $user->id)->with(['roles', 'roles.permissions', 'permissions'])->first(),
                new UserTransformer()
            )
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
        $this->authorize('destroy', User::class);

        $user = User::find($id);

        User::find($id)->delete();

        return ResponseFacade::deleteRespond();
    }
}
