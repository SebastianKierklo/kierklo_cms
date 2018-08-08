<?php

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{path}', function () {
    return view('welcome');
})->where( 'path', '.*' );