<?php

use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductDetailController;
use App\Http\Controllers\Api\ProductPhotoController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SiteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->resource('users', 'UserController');

Route::post('login', [LoginController::class, 'login']);

Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [UserController::class, 'update']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::delete('{id}', [UserController::class, 'destroy']);
    Route::resource('', UserController::class);
});

Route::group(['prefix' => 'role', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [RoleController::class, 'update']);
    Route::get('{id}', [RoleController::class, 'show']);
    Route::delete('{id}', [RoleController::class, 'destroy']);
    Route::resource('', RoleController::class);
});

Route::middleware('auth:api')->get('permission', [PermissionController::class, 'index']);

Route::group(['prefix' => 'site', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [SiteController::class, 'update']);
    Route::get('{id}', [SiteController::class, 'show']);
    Route::delete('{id}', [SiteController::class, 'destroy']);
    Route::resource('', SiteController::class);
});

Route::group(['prefix' => 'category', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [CategoryController::class, 'update']);
    Route::get('{id}', [CategoryController::class, 'show']);
    Route::delete('{id}', [CategoryController::class, 'destroy']);
    Route::resource('', CategoryController::class);
});

Route::group(['prefix' => 'product', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [ProductController::class, 'update']);
    Route::get('{id}', [ProductController::class, 'show']);
    Route::delete('{id}', [ProductController::class, 'destroy']);
    Route::resource('', ProductController::class);
});

Route::group(['prefix' => 'product-detail', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [ProductDetailController::class, 'update']);
    Route::get('{id}', [ProductDetailController::class, 'show']);
    Route::delete('{id}', [ProductDetailController::class, 'destroy']);
    Route::resource('', ProductDetailController::class);
});

Route::group(['prefix' => 'product-photo', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [ProductPhotoController::class, 'update']);
    Route::get('{id}', [ProductPhotoController::class, 'show']);
    Route::delete('{id}', [ProductPhotoController::class, 'destroy']);
    Route::resource('', ProductPhotoController::class);
});

Route::group(['prefix' => 'slider', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [SliderController::class, 'update']);
    Route::get('{id}', [SliderController::class, 'show']);
    Route::delete('{id}', [SliderController::class, 'destroy']);
    Route::resource('', SliderController::class);
});

Route::group(['prefix' => 'news', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [NewsController::class, 'update']);
    Route::get('{id}', [NewsController::class, 'show']);
    Route::delete('{id}', [NewsController::class, 'destroy']);
    Route::resource('', NewsController::class);
});

Route::group(['prefix' => 'testimonial', 'middleware' => 'auth:api'], function () {
    Route::post('{id}', [TestimonialController::class, 'update']);
    Route::get('{id}', [TestimonialController::class, 'show']);
    Route::delete('{id}', [TestimonialController::class, 'destroy']);
    Route::resource('', TestimonialController::class);
});
