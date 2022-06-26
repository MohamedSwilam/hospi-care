<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\WebsiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\App;
Route::domain('dashboard.' . env('APP_URL', 'hospi-care.fr'))->group(function () {
    Route::get('/{any}', [DashboardController::class, 'index'])->where('any', '.*');
});

//Route::domain('www.' . env('APP_URL', 'hospi-care.fr'))->group(function () {
//    Route::get('/', [WebsiteController::class, 'welcome']);
//});

Route::localized(function () {
//    Route::domain('{site}.' . env('APP_URL', 'hospi-care.fr'))->group(function () {


        Route::get('/', [WebsiteController::class, 'home'])->name('home');

        Route::get('/categories', [WebsiteController::class, 'categories'])->name('categories');

        Route::get('/categories/{id}', [WebsiteController::class, 'categoryProducts'])->name('category-products');

        Route::get('/categories/{category_id}/{product_id}', [WebsiteController::class, 'productDetails'])->name('product-details');

//        Route::get('/gallery', function ($site) {
//            return view('pages.gallery', ['site' => $site]);
//        })->name('gallery');

        Route::get('/news', [WebsiteController::class, 'news'])->name('news');

        Route::get('/news/{id}', [WebsiteController::class, 'newsDetails'])->name('news-details');

        Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('about');

        Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('contact');

        Route::get('/{any}', function ($site) {
            return view('layouts.error', ['site' => $site]);
        })->name('error');
//    });

//    Route::get('/', [WebsiteController::class, 'welcome'])->name('welcome');

//    Route::get('/', function () {
//        return view('layouts.welcome');
//    })->name('welcome');
}, [
    'supported-locales' => ['en', 'fr'],
    'omit_url_prefix_for_locale' => 'en',
    'use_locale_middleware' => false,
]);
