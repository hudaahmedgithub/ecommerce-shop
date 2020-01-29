<?php

Route::group(['middleware' => 'cart'], function () {
	Route::get('locale/{locale}',function ($locale){
	App::setLocale($locale);
	session()->put('locale', $locale);
	return redirect()->back();
	});
    # Authentication Routes
   Auth::routes();
    # The Landing Page Routes
    // Route::get('/', 'Landing\LandingController@index')->name('home');
	
 /**
 * ----------------------------------------
 * |                                      |
 * |        Frontend Routes                |
 * |                                      |
 * ----------------------------------------
 */
Route::get('/', 'HomeController@index');

Route::post('/HomeSearch','HomeController@HomeSearch')->name('HomeSearch');
	
Route::post('/store-review','HomeController@store')->name('store-review');

Route::get('/readReview','HomeController@readReview')->name('readReview');
	
Route::get('/allProducts','Products\ProductController@allProducts')->name('allProducts');
	
Route::post('/getCategory','Products\ProductController@getCategory')->name('getCategory');
	
Route::post('/getSearch','Products\ProductController@getSearch')->name('getSearch');
	
Route::resource('/products', 'Products\ProductController');
	
Route::post('/low','Products\ProductController@low');
	
Route::post('/rangePrice','Products\ProductController@rangePrice');
	
Route::get('/getSide','Products\ProductController@getSide');	
	
Route::get('/product-details/{id}', 'Products\ProductController@productDetails')->name('product-details');

Route::get('/shopping-cart', 'Products\CartController@index');
	
Route::get('/cart/addItem/{id}', 'Products\CartController@addItem');

Route::put('/cart/update/{id}', 'Products\CartController@update');

Route::get('/cart/remove', 'Products\CartController@remove');

Route::get('/check-out', 'Products\CheckoutController@index');

Route::post('/formvalidate','Products\CheckoutController@address');

Route::get('/category','Products\ProductController@category');
	
	/////////contact /////////
Route::match(['GET','POST'],'/pages/contact','Landing\ContactsController@contact');
	////////user home///////////
	
//Route::get('/user/{id}','Users\UserController@index');
	
Route::post('/updatePassword', 'Users\UserController@updatePassword');  
	
Route::get('/profile','Users\UserController@index')->name('profile');

Route::get('/read','Users\UserController@read');
	
Route::get('/order','Users\UserController@order');	

Route::get('/details','Users\UserController@details')->name('details');	

Route::post('/saveDetails','Users\UserController@saveDetails')->name('saveDetails');	

Route::post('/post','Users\UserController@post')->name('post');
	
Route::post('/passEdit','Users\UserController@passEdit')->name('passEdit');	
	
Route::post('/editAddress','Users\UserController@editAddress')->name('editAddress');	
	
Route::post('/postDelete','Users\UserController@postDelete')->name('postDelete');	
});

