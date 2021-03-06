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

//Route::get('/', 'PagesController@root')->name('root');
Route::get('/', 'TopicsController@index')->name('root');
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
//帖子
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
//分类排序
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

//上传图片
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
//SEO
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
//回复帖子
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
//消息通知
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);
//『关注的人』列表页面和『粉丝』列表页面
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');
//关注取消关注
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');

