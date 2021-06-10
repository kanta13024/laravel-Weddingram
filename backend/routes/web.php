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

Route::get('/', 'WebController@index');

// マイページ編集用
Route::get('users/mypage', 'UserController@mypage')->name('mypage');
Route::get('users/mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::put('users/mypage', 'UserController@update')->name('mypage.update');
Route::get('users/mypage/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('users/mypage/password', 'UserController@update_password')->name('mypage.update_password');
Route::delete('users/mypage/delete', 'UserController@destroy')->name('mypage.destroy');

//コメント用
Route::post('posts/{post}/comments', 'CommentController@store');

//いいね用
Route::get('users/mypage/favorite', 'UserController@favorite')->name('mypage.favorite');
Route::get('posts/{post}/favorite', 'PostController@favorite')->name('posts.favorite');
Route::get('posts/{post}/comments/{comment}/favorite', 'CommentController@favorite')->name('comments.favorite');


//マイページ用
Route::resource('posts', 'postController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//管理ページ
Route::get('/dashboard', 'DashboardController@index')->middleware('auth:admins');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::get('login', 'Dashboard\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Dashboard\Auth\LoginController@login')->name('login');

    //式場カラムの作成
    Route::resource('places', 'Dashboard\PlaceController')->middleware('auth:admins');;

    //結婚アルバムの作成
    Route::resource('wedding_albums', 'Dashboard\WeddingAlbumController')->middleware('auth:admins');

    //アルバムの写真の管理
    Route::resource('posts', 'Dashboard\PostController')->middleware('auth:admins');

    //Userの管理
    Route::resource('users', 'Dashboard\UserController')->middleware('auth:admins');


});
