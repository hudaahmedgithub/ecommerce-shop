<?php

Route::group(['middleware' => 'cart'], function () {
    # Authentication Routes
    Auth::routes();

    # The Landing Page Routes
    // Route::get('/', 'Landing\LandingController@index')->name('home');
    Route::get('/', function() {
        return "Hello world";
    });
});
