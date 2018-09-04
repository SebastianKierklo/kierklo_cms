<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login','UserController@getLogin')->name('login');
Route::post('/login', 'UserController@postLogin');
Route::post('/logout', 'UserController@postLogOut');
Route::namespace('Admin')->middleware('auth')->prefix('admin')->group(function () {

    Route::get('/test','AdminController@index');

    Route::get('/dashboard', function () {
        return view('welcome');
    })->where( 'path', '.*' )->name('dashboard');

    Route::get('{path}', function () {
        return view('welcome');
    })->where( 'path', '.*' );
});
