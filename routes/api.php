<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ReviewController;



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

 Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
 });
// Route::get('me', 'AuthController@me');
// Route::post('login', 'AuthController@login');
// Route::post('register', 'AuthController@register');
// Route::post('logout', 'AuthController@logout');
// Route::apiResource('apartments', 'ApartmentController');
// Route::apiResource('apartments/{apartments}/reviews', 'ReviewController')
//     ->only('store', 'update', 'destroy');

    Route::post('/user/login',[AuthController::class, 'login'])->name('login');
    Route::post('/user/register',[AuthController::class, 'register'])->name('register');
    Route::get('/user/logout',[AuthController::class, 'logout'])->name('logout');
    Route::apiResources([
        'apartment' => ApartmentController::class,
        'review' => ReviewController::class,
    ]);



