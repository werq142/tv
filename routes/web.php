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
Route::group(['middleware' => 'ip'], function () {

    //Index
    Route::get('/', 'MainController@index')->name('home');
    Route::get('/categories/{category}', 'MainController@showCategory');
    Route::get('/videos/{video}', 'MainController@showVideo');

    //User
    Route::resource('users', 'UsersController', ['except' => 'create,store']);

    //Comment
    Route::post('/videos/{video}/comments', 'CommentsController@store');

    //Login/out
    Route::get('/login', 'SessionsController@create')->name('login');
    Route::post('/login', 'SessionsController@store');
    Route::get('/logout', 'SessionsController@destroy');

    //Admin
    Route::group([
        'middleware' => 'admin',
        'prefix' => '/dashboard'
    ], function () {

        Route::resource('categories', 'CategoriesController');
        Route::resource('videos', 'VideosController');
        Route::get('/', 'AdminController@dashboard');
        Route::get('/registration', 'AdminController@controlRegistration');
        Route::post('/ip', 'AdminController@addIp');
    });
});
