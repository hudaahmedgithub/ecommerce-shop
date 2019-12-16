<?php

/**
 * Backend Routes
 */
Route::get('locale/{locale}',function ($locale){
	App::setLocale($locale);
	session()->put('locale', $locale);
	
    return redirect()->back();
		   });

Route::prefix('admin')->group(function() {

    /**
     * Authentication Routes
     */
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => 'auth:admin'], function () {

        /**
         * Home Routes
         */
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('home', 'HomeController@index')->name('admin.home');
         //user routes
      
	/////roles//////
		Route::resource('roles','Admins\RolesController', ['as' => 'admin']);

		///////////////
Route::get('new','Admins\NewController@index');
	////////permission////
	Route::resource('permissions','Admins\PermissionsController', ['as' => 'admin']);

	  Route::get('users/trashed', 'Users\UsersController@trashed')->name('admin.users.trashed');
        Route::post('users/{id}/restore', 'Users\UsersController@restore')->name('admin.users.restore');
        Route::post('users/{id}/force', 'Users\UsersController@force')->name('admin.users.force');	Route::resource('users','Admins\UserController', ['as' => 'admin']);

        /**
         * Users Routes
         */
		
        Route::get('users/trashed', 'Users\UsersController@trashed')->name('admin.users.trashed');
        Route::post('users/{id}/restore', 'Users\UsersController@restore')->name('admin.users.restore');
        Route::post('users/{id}/force', 'Users\UsersController@force')->name('admin.users.force');
        Route::resource('users', 'Users\UsersController', ['as' => 'admin']);

        Route::get('admins/trashed', 'Admins\AdminsController@trashed')->name('admin.admins.trashed');
        Route::post('admins/{id}/restore', 'Admins\AdminsController@restore')->name('admin.admins.restore');
        Route::post('admins/{id}/force', 'Admins\AdminsController@force')->name('admin.admins.force');
        Route::resource('admins', 'Admins\AdminsController', ['as' => 'admin']);

        /**
         * Utilities Routes
         */
        Route::resource('countries', 'Utilities\CountriesController', ['as' => 'admin']);
        Route::resource('currencies', 'Utilities\CurrenciesController', ['as' => 'admin']);

        /**
         * Contacts and Property Contacts Routes
         */
        Route::resource('contacts', 'Contacts\ContactsController', ['as' => 'admin']);

        /**
         * Products Routes
         */
        Route::resource('categories', 'Products\CategoriesController', ['as' => 'admin']);
        Route::get('products/test', 'Products\ProductsController@test');
        Route::resource('sliders', 'Products\SliderController', ['as' => 'admin']);
        Route::resource('products', 'Products\ProductsController', ['as' => 'admin']);
        Route::resource('reviews', 'Products\ReviewsController', ['as' => 'admin']);
        Route::resource('coupons', 'Products\CouponsController', ['as' => 'admin']);

        Route::get('reservations/analytics', 'Products\ReservationsController@analytics')->name('admin.reservations.analytics');
        Route::post('reservations/status/{id}', 'Products\ReservationsController@status', ['as' => 'admin'])->name('reservations.status');
        Route::resource('reservations', 'Products\ReservationsController', ['as' => 'admin']);
		Route::post('reservations/active','Products\ReservationsController@activeStatus', ['as' => 'admin']);

    });

});
