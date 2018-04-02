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

//Index
Route::get('/', 'MainController@index')->name('home');
Route::get('/categories/{category}', 'MainController@showCategory');
Route::get('/videos/{video}', 'MainController@showVideo');

//User
Route::resource('users', 'UsersController',['except' => 'create,store']);

//Register
/*Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');*/

//Login/out
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

//Admin
Route::group([
        'middleware' => 'admin',
        'prefix' => '/dashboard'
    ], function() {

    Route::resource('categories', 'CategoriesController');
    Route::resource('videos', 'VideosController');
});

