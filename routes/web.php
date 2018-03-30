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

Route::group(['middleware' => 'admin'], function() {

    Route::get('/dashboard', 'CategoriesController@show');

    Route::get('/dashboard/categories', 'CategoriesController@show');
    Route::get('/dashboard/categories/add', 'CategoriesController@add');
    Route::get('/dashboard/categories/{category}/edit', 'CategoriesController@edit');
    Route::get('/dashboard/categories/{category}/delete', 'CategoriesController@delete');

    Route::post('/dashboard/categories/store', 'CategoriesController@store');
    Route::post('/dashboard/categories/{category}/save', 'CategoriesController@save');

    Route::get('/dashboard/videos', 'VideosController@show');
    Route::get('/dashboard/videos/add', 'VideosController@add');
    Route::get('/dashboard/videos/{video}/edit', 'VideosController@edit');
    Route::get('/dashboard/videos/{video}/delete', 'VideosController@delete');

    Route::post('/dashboard/videos/store', 'VideosController@store');
    Route::post('/dashboard/videos/{video}/save', 'VideosController@save');

});

