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

Route::get('/',  function () {
    return view('layouts.master');})->name('home');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::group([
        'middleware' => 'admin',
        'prefix' => '/dashboard'
    ], function() {

    /*Route::get('', 'CategoriesController@show');

    Route::get('/categories', 'CategoriesController@show');
    Route::get('/categories/add', 'CategoriesController@add');
    Route::get('/categories/{category}/edit', 'CategoriesController@edit');
    Route::get('/categories/{category}/delete', 'CategoriesController@delete');

    Route::post('/categories/store', 'CategoriesController@store');
    Route::post('/categories/{category}/save', 'CategoriesController@save');*/

    Route::resource('categories', 'CategoriesController');

    Route::get('/videos', 'VideosController@show');
    Route::get('/videos/add', 'VideosController@add');
    Route::get('/videos/{video}/edit', 'VideosController@edit');
    Route::get('/videos/{video}/delete', 'VideosController@delete');

    Route::post('/videos/store', 'VideosController@store');
    Route::post('/videos/{video}/save', 'VideosController@save');

});

