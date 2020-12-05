<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('/signup', 'App\Http\Controllers\Api\AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('/logout', 'App\Http\Controllers\Api\AuthController@logout');
        Route::get('/user', 'App\Http\Controllers\Api\AuthController@user');
    });
   // Route::get('/home', 'App\Http\Controllers\Api\HomeController@index')->name('home');
});

Route::group([
    'prefix' => 'product'
], function () {
    Route::get('/get_product', 'App\Http\Controllers\Api\ProductController@index');
    Route::get('/see', 'App\Http\Controllers\Api\ProductController@store');


    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::post('/insert_product', 'App\Http\Controllers\Api\ProductController@create');

    });
   // Route::get('/home', 'App\Http\Controllers\Api\HomeController@index')->name('home');
});
