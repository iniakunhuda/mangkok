<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MerchantController as AdminMerchantController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/tentang-kami', [IndexController::class, 'tentangKami'])->name('about');
Route::get('/produk', [ProductController::class, 'index'])->name('product.index');
Route::get('/produk/detail/{slug}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/unitdagang', [MerchantController::class, 'index'])->name('merchant.index');
Route::get('/unitdagang/detail/{code}', [MerchantController::class, 'detail'])->name('merchant.detail');
Route::get('/kontak', [IndexController::class, 'kontak'])->name('contact');

Route::group(['prefix' => 'galeri', 'as' => 'gallery.'], function() {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/detail/{slug}', [GalleryController::class, 'detail'])->name('detail');
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function() {
    Route::get('/view', [IndexController::class, 'cartView'])->name('view');
    Route::get('/checkout', [IndexController::class, 'cartCheckout'])->name('checkout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('login', [AdminAuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'postLogin'])->name('login.post');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('merchants', AdminMerchantController::class);
    Route::resource('products', AdminProductController::class);

    Route::group(['prefix' => 'products/photo', 'as' => 'products.photo.'], function() {
        Route::get('index', [AdminProductController::class, 'photoIndex'])->name('index');
        Route::get('create', [AdminProductController::class, 'photoCreate'])->name('create');
        Route::post('store', [AdminProductController::class, 'photoStore'])->name('store');
        Route::get('edit/{photo}', [AdminProductController::class, 'photoEdit'])->name('index');
        Route::put('update/{photo}', [AdminProductController::class, 'photoUpdate'])->name('update');
        Route::delete('destroy/{photo}', [AdminProductController::class, 'photoDestroy'])->name('destroy');
    });

});
