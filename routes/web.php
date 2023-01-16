<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\MainBannerController;
use App\Http\Controllers\OuterBannerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('front.home');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Dashboard
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

     //Banner Section
     Route::resource('banner', BannerController::class);
     Route::post('banner_status', [App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

     //Main Banner Section
     Route::resource('main_banner', MainBannerController::class);
     Route::post('mainbanner_status', [App\Http\Controllers\MainBannerController::class, 'bannerStatus'])->name('banner.status');
    
     //Outer Banner Section
     Route::resource('outer_banner', OuterBannerController::class);
     Route::post('outerbanner_status', [App\Http\Controllers\OuterBannerController::class, 'bannerStatus'])->name('banner.status');

     //Category Section
    Route::resource('category', CategoryController::class);
    Route::post('category_status', [App\Http\Controllers\CategoryController::class, 'categoryStatus'])->name('category.status');
    
    Route::post('category/{id}/child', [\App\Http\Controllers\CategoryController::class, 'getChildByParentID']);

    //Brand Section
    Route::resource('brand', BrandController::class);
    Route::post('brand_status', [App\Http\Controllers\BrandController::class, 'brandStatus'])->name('brand.status');

    //Product Section
    Route::resource('product', ProductController::class);
    Route::post('product_status', [App\Http\Controllers\ProductController::class, 'productStatus'])->name('product.status');

     //User Section
     Route::resource('user', UserController::class);
     Route::post('user_status', [App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');
});

