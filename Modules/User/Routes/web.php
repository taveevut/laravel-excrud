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

Route::prefix('user')->group(function() {
    Route::name('user.')->group(function() {
        Route::namespace('Auth')->group(function() {
            Route::get('/', 'UserLoginController@index')->name('index');
            Route::get('login', 'UserLoginController@index')->name('login');
            Route::post('login', 'UserLoginController@login')->name('login');
            Route::post('logout', 'UserLoginController@logout')->name('logout');
        });

        Route::middleware('user')->group(function() {
            Route::get('/dashboard', 'UserController@index')->name('dashboard');
        });
    });
});

