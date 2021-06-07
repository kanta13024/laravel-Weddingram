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

use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

// マイページ編集用
Route::get('users/mypage', 'UserController@mypage')->name('mypage');
Route::get('users/mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::put('users/mypage', 'UserController@update')->name('mypage.update');
Route::get('users/mypage/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('users/mypage/password', 'UserController@update_password')->name('mypage.update_password');

//コメント用
Route::post('posts/{post}/comments', 'CommentController@store');

//いいね用
Route::get('posts/{post}/favorite', 'PostController@favorite')->name('posts.favorite');
Route::get('posts/{post}/comments/{comment}/favorite', 'CommentController@favorite')->name('comments.favorite');


//マイページ用
Route::resource('posts', 'postController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
