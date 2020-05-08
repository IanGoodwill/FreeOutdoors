<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::post('/posts/{id}/act', 'LikeController@actOnPost');

Route::get('post/like/{id}', ['as' => 'post.like', 'uses' => 'LikeController@likePost']);

Route::get('/posts/{id}/act', ['as' => 'comment.like', 'uses' => 'LikeController@likeComment']);

Route::get('profile/{id}', 'ProfileController@showPost');

Route::get('post/{id}', 'PostController@showProfile');

Route::resource( 'posts', 'PostController' );

Route::resource( 'profiles', 'ProfileController' );

Route::resource( 'comments', 'CommentController' );

Route::post('/comment/store', 'CommentController@store')->name('comment.add');

Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');