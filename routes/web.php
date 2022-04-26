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
Route::group(['prefix'=>'posts/{post}'],function(){
Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
});
Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@HostIndex');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::delete('/posts/{post}', 'PostController@delete');
Route::get('/teams/{team_id}', 'PostController@latestPostAjax');
Route::get('/posts/create/teams/{team_id}', 'PostController@TeamSelectAjax');
Route::get('/players', 'PlayerController@index');
Route::get('/players/{player}', 'PlayerController@show');
Route::get('/players/create', 'PlayerController@create');
Route::post('/players', 'PlayerController@store');
Route::get('/players/teams/{team_id}/', 'PlayerController@PlayerInfo');
Route::get('/users/teams/{team_id}/', 'PostController@userPost');
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{post}', 'UserController@show');
Route::delete('/users/{post}', 'UserController@delete');
Route::get('/posts/{post}/comments/', 'CommentController@postIndex');
Route::get('/users/{post}/comments/', 'CommentController@userIndex');
Route::get('/posts/comments/create/{post}', 'CommentController@postCreate');
Route::post('/comments', 'CommentController@store');
Route::post('/comments/like', 'CommentController@like')->name('comments.like');
Route::delete('/comments/{comment}', 'CommentController@delete');
Route::post('/like', 'PostController@like')->name('posts.like');
Route::get('/ranking','RankingController@index');
Route::get('/ranking/create','RankingController@create');
Route::get("/ranking/create/pg/teams/{team_id}", "RankingController@pgTeamSelectAjax");
Route::get("/ranking/create/sg/teams/{team_id}", "RankingController@sgTeamSelectAjax");
Route::get("/ranking/create/sf/teams/{team_id}", "RankingController@sfTeamSelectAjax");
Route::get("/ranking/create/pf/teams/{team_id}", "RankingController@pfTeamSelectAjax");
Route::get("/ranking/create/c/teams/{team_id}", "RankingController@cTeamSelectAjax");
Route::post('/ranking', 'RankingController@store');
Route::delete('/ranking/{ranking}', 'RankingController@delete');
Route::post('/ranking/like', 'RankingController@like')->name('rankings.like');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/nbaapi', 'PlayerController@basketapi');
Route::get('/teamapi', 'TeamController@teamapi');