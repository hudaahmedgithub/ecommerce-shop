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
	
    Route::get('/', function() {
        return "Hello world";
    });
	
	/**
 * ----------------------------------------
 * |                                      |
 * |        Frontend Routes                |
 * |                                      |
 * ----------------------------------------
 */

Route::resource('/products', 'Products\ProductController');

Route::get('/product-details/{id}', 'Products\ProductController@productDetails');

Route::get('/shopping-cart', 'Products\CartController@index');
	
Route::get('/cart/addItem/{id}', 'Products\CartController@addItem');

Route::put('/cart/update/{id}', 'Products\CartController@update');

Route::get('/cart/remove/{id}', 'Products\CartController@destroy');

Route::get('/check-out', 'Products\CheckoutController@index');

Route::post('/formvalidate','Products\CheckoutController@address');

Route::get('/category/{id}','Products\ProductController@category');
	////////user home///////////
	
//Route::get('/user/{id}','Users\UserController@index');
	
Route::post('/updatePassword', 'Users\UserController@updatePassword');  
	
Route::get('/profile','Users\UserController@index')->name('profile');

Route::get('/read','Users\UserController@read');	

Route::post('/post','Users\UserController@post')->name('post');
	
Route::post('/passEdit','Users\UserController@passEdit')->name('passEdit');	
	
Route::post('/editAddress','Users\UserController@editAddress')->name('editAddress');	
	
Route::post('/postDelete','Users\UserController@postDelete')->name('postDelete');	
});

