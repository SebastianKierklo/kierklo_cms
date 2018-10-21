<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login','UserController@getLogin')->name('login');
Route::post('/login', 'UserController@postLogin');
Route::post('/logout', 'UserController@postLogOut');
Route::namespace('Admin')->middleware('auth')->prefix('admin')->group(function () {

    Route::get('/test','AdminController@index');

    //Settings
    Route::post('/settings','SettingController@index');
    Route::post('/settings/add','SettingController@add');
    Route::post('/settings/remove','SettingController@remove');
    Route::post('/creator-fields','AdminController@getFields');

    //Page
    Route::post('/page/add','PageController@postAdd');
    Route::post('/page/list','PageController@postList');
    Route::post('/page/delete/{id}','PageController@postDelete');
    Route::post('/page/get/{id}','PageController@getPage');
    Route::post('/page/set-content','PageController@setPageContent');

    //Galeries
    Route::post('/galeries/item','GaleryController@getGalery');
    Route::post('/galeries/list','GaleryController@getGaleries');
    Route::post('/galeries/add','GaleryController@add');
    Route::post('/galeries/edit','GaleryController@edit');
    Route::post('/galeries/remove','GaleryController@remove');

//    Route::get('/dashboard', function () {
//        return view('welcome');
//    })->where( 'path', '.*' )->name('dashboard');

    //Vue
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('{path}', function () {
        return view('welcome');
    })->where( 'path', '.*' );
});
