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

//コメント用
Route::post('posts/{post}/comments', 'CommentController@store');

//いいね用
Route::get('posts/{post}/favorite', 'PostController@favorite')->name('posts.favorite');

//マイページ用
Route::resource('posts', 'postController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
