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

Route::get('/', "PostController@index") ->name("posts.index");  //投稿一覧ページにアクセス
Route::post('/', "PostController@store") ->name("post.store");  //投稿内容の送信、保存
Route::get('/{id}', "CommentController@detail") ->name("post.detail");  //idを取得して記事の詳細画面を表示
Route::post('/{id}', "CommentController@store")  ->name("comment.store");  //コメント追加
Route::delete('/{id}', "CommentController@destroy") ->name("comment.destroy");  //コメント削除

