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
    Route::post('/user_signup', 'App\Http\Controllers\Api\AuthController@user_signup');
    Route::post('/owner_signup', 'App\Http\Controllers\Api\AuthController@owner_signup');
    Route::post('/dealer_signup', 'App\Http\Controllers\Api\AuthController@dealer_company_signup');
    Route::post('/lawyer_signup', 'App\Http\Controllers\Api\AuthController@lawyer_signup');


    Route::group([
      'middleware' => 'auth:api, cors'
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
    Route::get('/seeto', 'App\Http\Controllers\Api\ProductController@product_index');
    Route::get('/get_requ', 'App\Http\Controllers\Api\RequirementController@index');
    Route::post('/see', 'App\Http\Controllers\Api\ProductController@search_prod_by_id');
    Route::post('/search', 'App\Http\Controllers\Api\ProductController@search_func');
    Route::post('/requ', 'App\Http\Controllers\Api\RequirementController@create');
    Route::post('/insert_product_sale', 'App\Http\Controllers\Api\ProductController@create_sale');
    Route::post('/insert_product_rent', 'App\Http\Controllers\Api\ProductController@create_rent');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
      Route::post('/insert_product_sale', 'App\Http\Controllers\Api\ProductController@create_sale');
      Route::post('/insert_product_rent', 'App\Http\Controllers\Api\ProductController@create_rent');


    });
   // Route::get('/home', 'App\Http\Controllers\Api\HomeController@index')->name('home');
});
