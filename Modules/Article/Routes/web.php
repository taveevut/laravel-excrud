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
        Route::namespace('User')->group(function() {
            Route::middleware('user')->group(function() {
                Route::resource('article', 'ArticleController');
            });
        });
    });
});