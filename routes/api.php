<?php

use Illuminate\Http\Request;

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

Route::get('category','ApiController@showcategoryget')->name('showcategoryget');

Route::get('procat','ApiController@procat')->name('procat');

Route::get('getcity','ApiController@getcity')->name('getcity');

Route::get('AllProduct','ApiController@showallproduct')->name('showallproduct');


