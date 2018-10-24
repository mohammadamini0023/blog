<?php

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

Route::get('/', 'IndexController@showindex')->name('showindex');
Route::post('/', 'IndexController@showindex')->name('showindex1');
//Route::get('/get', 'IndexController@showindex1')->name('showindex2');



// route auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Add Product
Route::get('/home/AddProductGet', 'HomeController@AddProductGet')->name('AddProductGet');
Route::post('/home/AddProductPost','HomeController@AddProductPost')->name('AddProductPost');

//show product
Route::get('/home/ShowProduct/{id}','HomeController@ShowProduct')->name('ShowProduct',['id']);

//delete product
Route::get('/home/deleteProduct/{user_id}/{product_id}','HomeController@DeleteProduct')->name('deleteproduct',['product_id','user_id']);

//update product
Route::get('/home/updataproductGet/{product_id}','HomeController@updataproductGet')->name('updataproductGet',['product_id']);
Route::post('/home/updataproductPost/{product_id}','HomeController@updataproductPost')->name('updataProductPost',['product_id']);

//send mail
Route::get('/users/confirmation/{token}','Auth\RegisterController@confrimation')->name('confrimation');

//singlepage show
Route::get('/Singlepage/{product_id}','Indexcontroller@singlepage')->name('singlepage',['product_id']);

//Bidding ثبت قیمت
Route::post('/Singlepage/{product_id}','HomeController@Bidding')->name('Bidding',['product_id']);

//sendcomment
Route::post('/Singlepage/{product_id}/sendcomment','HomeController@sendcomment')->name('sendcomment',['product_id']);




