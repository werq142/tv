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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categories', 'CategoriesController@show');
Route::get('/categories/add', 'CategoriesController@add');
Route::get('/categories/{category}/edit', 'CategoriesController@edit');
Route::get('/categories/{category}/delete', 'CategoriesController@delete');

Route::post('/categories/store','CategoriesController@store');
Route::post('/categories/{category}/save','CategoriesController@save');

Route::get('/videos', 'VideosController@show');
Route::get('/videos/add', 'VideosController@add');
Route::get('/videos/{video}/edit', 'VideosController@edit');
Route::get('/videos/{video}/delete', 'VideosController@delete');

Route::post('/videos/store', 'VideosController@store');
Route::post('/videos/{video}/save', 'VideosController@save');
