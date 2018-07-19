<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{vue?}', function() {
    return view('app');
})->where('vue', '[\/\w\.-]*');
