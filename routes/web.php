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
Route::get('/menu', [IndexController::class, 'menu'])->name('menu');
Route::get('/menu/detail/{id}', [IndexController::class, 'menuDetail'])->name('menu.detail');
Route::get('/pesanan', [IndexController::class, 'pesanan'])->name('pesanan');
Route::get('/tentang', [IndexController::class, 'tentang'])->name('tentang');
Route::get('/riwayat_pesanan', [IndexController::class, 'riwayat_pesanan'])->name('riwayat_pesanan');
Route::post('/checkout', [IndexController::class, 'checkout'])->name('checkout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'merchant', 'as' => 'merchant.'], function() {
    Route::get('login', [AdminAuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'postLogin'])->name('login.post');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
