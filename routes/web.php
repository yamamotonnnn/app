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




Route::get('/','PostController@index');
Route::post('/start','PostController@start');
Route::post('/end','PostController@end');

Route::get('/posts/{post}/comment/create', 'PostController@comment');
Route::get('/timeline','PostController@timeline');
Route::get('/posts/{post}/comment', 'PostController@show');

Route::get('/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
//Route::get('/posts/{post}/comment/create', 'PostController@comment');
Route::post('/comment_store', 'PostController@comment_store');