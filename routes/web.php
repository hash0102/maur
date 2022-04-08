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
Route::group(['middleware' => ['auth']], function(){
Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@HostIndex');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::delete('/posts/{post}', 'PostController@delete');
Route::get('/teams/{team_id}', 'PostController@latestPostAjax');

Route::get('/players', 'PlayerController@index');
Route::get('/players/create', 'PlayerController@create');
Route::post('/players', 'PlayerController@store');
Route::get('/players/teams/{team_id}/', 'PlayerController@PlayerInfo');

Route::get('/users/teams/{team_id}/', 'PostController@userPost');
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{post}', 'UserController@show');

Route::get('/posts/{post}/comments/', 'CommentController@postIndex');
Route::get('/users/{post}/comments/', 'CommentController@userIndex');
Route::get('/posts/comments/create/{post}', 'CommentController@postCreate');
Route::post('/comments', 'CommentController@store');

Route::get('/posts/like/{id}', 'PostController@like')->name('post.like');
Route::get('/posts/unlike/{id}', 'PostController@unlike')->name('post.unlike');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
