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


//index route
Route::get('ProCategoryIndex','ApiController@ProCategoryIndex')->name('ProCategoryIndex');
Route::get('Category','ApiController@showcategoryget')->name('showcategoryget');

//index route for select product in by category
Route::get('ProCategorySelect','ApiController@ProCategorySelect')->name('ProCategorySelect');



Route::get('getcity','ApiController@getcity')->name('getcity');

Route::get('AllProduct','ApiController@showallproduct')->name('showallproduct');
