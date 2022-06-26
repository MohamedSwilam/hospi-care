<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Responses\Facades\ResponseFacade;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $login_credentials = $request->validated();

        if (!Auth::guard('web')->attempt($login_credentials)){
            return response()->json(['error' => 'Incorrect email or password'], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $login_credentials['email'])->with(['roles','roles.permissions', 'permissions'])->first();

        return ResponseFacade::respond("login credentials correct", [
            'user' => $user,
            'access_token' => $user->createToken('token'),
            'token_type' => 'Bearer',
        ], 200);
    }
}
