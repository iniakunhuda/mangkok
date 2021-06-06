<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['as' => 'api.'], function(){
    Route::group(['prefix' => 'v1', 'as' => 'v1.'], function(){
        Route::group(['prefix' => 'cart', 'as' => 'cart.'], function(){
            Route::get('/list', [CartController::class, 'list'])->name('list');
            Route::get('/count', [CartController::class, 'count'])->name('count');
            Route::post('/add/{id}', [CartController::class, 'add'])->name('add');
            Route::post('/remove/{id}', [CartController::class, 'remove'])->name('remove');
            Route::post('/destroy', [CartController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
