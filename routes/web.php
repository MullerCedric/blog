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

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/', 'PostController@index')->name('landing');
Route::get('/posts/create', 'PostController@create')->middleware('auth');
Route::post('/posts', 'PostController@store')->middleware('auth');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('can:update,post');
Route::put('/posts/{post}', 'PostController@update')->middleware('can:update,post');
Route::delete('/posts/{post}', 'PostController@destroy')->middleware('can:delete,post');

Route::get('/users/{user}/posts', 'AuthorPostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
