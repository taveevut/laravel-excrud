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

Route::prefix('student')->group(function() {
    Route::name('student.')->group(function() {
        Route::namespace('Auth')->group(function() {
            Route::get('/', 'StudentLoginController@index')->name('index');
            Route::get('login', 'StudentLoginController@index')->name('login');
            Route::post('login', 'StudentLoginController@login')->name('login');
            Route::post('logout', 'StudentLoginController@logout')->name('logout');
        });

        Route::middleware('student')->group(function() {
            Route::get('/dashboard', 'StudentController@index')->name('dashboard');
        });
    });
});
