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

// Route::get('/getcity', 'IndexController@showindex')->name('showindex');
//Route::post('/postcity', 'IndexController@showindex')->name('showindex1');
//Route::get('/', 'IndexController@showindex2')->name('showindex2');

Route::any('{all}', function () {
    return view('welcome');
})
->where(['all' => '.*']);




// // route auth
// Auth::routes();
// //user panel
// Route::get('/home', 'HomeController@index')->name('home');


// //admin panel
// Route::get('/admin/home', 'AdminController@index')->name('admin');

// Route::prefix('admin/home')->group(function () {

//     //create category
//     Route::get('/Create-Category-Get', 'AdminController@CreateCategoryGet')->name('CreateCategoryGet');
//     Route::Post('/Create-Category-Post', 'AdminController@CreateCategoryPost')->name('CreateCategoryPost');
//     //show category
//     Route::get('/show-Category', 'AdminController@showcategory')->name('showcategory');
//     //create city
//     Route::view('/create-city', 'admin.createcity')->name('createcity');
//     Route::Post('/Create-city-post', 'AdminController@createcitypost')->name('createcitypost');
//     //show city
//     Route::get('/show-city', 'AdminController@showcity')->name('showcity');
//     //show check product
//     Route::get('/show-check-product', 'AdminController@showcheckproduct')->name('showcheckproduct');
//     //set check product
//     Route::get('/show-check-product/{product_id}', 'AdminController@checkproduct')->name('checkproduct',['product_id']);
//     //check product reject
//     Route::get('/show-check-product-reject/{product_id}', 'AdminController@checkproductreject')->name('checkproductreject',['product_id']);

// });


// Route::prefix('users/home')->group(function () {

//     //Add Product
//     Route::get('/AddProductGet/selectcategory', 'HomeController@AddProductGet')->name('AddProductGet');
//     Route::get('/AddProductGet1/selectcategory/{category_id}', 'HomeController@AddProductGet1')->name('AddProductGet1',['category_id']);
//     Route::post('/AddProductPost','HomeController@AddProductPost')->name('AddProductPost');

//     //show product
//     Route::get('/ShowProduct/{id}','HomeController@ShowProduct')->name('ShowProduct',['id']);

//     //show reject product
//     Route::get('/showrejectproduct/{id}','HomeController@showrejectproduct')->name('showrejectproduct',['id']);

//     //showbidding
//     Route::get('/Showbidding/{id}','HomeController@Showbidding')->name('Showbidding',['id']);

//     //delete product
//     Route::get('/deleteProduct/{user_id}/{product_id}','HomeController@DeleteProduct')->name('deleteproduct',['product_id','user_id']);

//     //update product
//     Route::get('/updataproductGet/{product_id}','HomeController@updataproductGet')->name('updataproductGet',['product_id']);
//     Route::post('/updataproductPost/{product_id}','HomeController@updataproductPost')->name('updataProductPost',['product_id']);

//     //edite city
//     Route::get('/editecity','HomeController@editecity')->name('editecity');

//     //auctions winner
//     Route::get('/auctionswinner/{user_id}','HomeController@auctionswinner')->name('auctionswinner',['user_id']);
// });


// //send mail
// Route::get('/users/confirmation/{token}','Auth\RegisterController@confrimation')->name('confrimation');

// //singlepage show
// Route::get('/Singlepage/{product_id}','Indexcontroller@singlepage')->name('singlepage',['product_id']);

// //Bidding ثبت قیمت
// Route::post('/Singlepage/{product_id}','HomeController@Bidding')->name('Bidding',['product_id']);

// //sendcomment
// Route::post('/Singlepage/{product_id}/sendcomment','HomeController@sendcomment')->name('sendcomment',['product_id']);




