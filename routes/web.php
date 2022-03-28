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

//URLにアクセスがあったらPostControllerで、’posts.index'という名前の'index'処理が実行され、投稿一覧ページを表示
Route::get('/', "PostController@index") ->name("post.index");  

//フォーム内容が送信されたら、PostControllerで'post.store’という名前の'store'処理が実行され、投稿内容がデータベースに保存
Route::post('/', "PostController@store") ->name("post.store");  

//投稿記事IDでアクセスされたら、CommentControllerで'post.detail'という名前の'detail'処理が実行され、記事の詳細ページを表示
Route::get('/detail/{id}', "CommentController@detail") ->name("post.detail");  

//投稿記事IDでアクセスされたら、CommentControllerで'comment.store'という名前の'store'処理が実行され、コメントがデータベースに保存
Route::post('/detail/{id}', "CommentController@store")  ->name("comment.store");  

//投稿記事IDでアクセスされたら、CommentControllerで'comment.destroy'という名前の'destroy'処理が実行され、対象コメントのみ削除
Route::delete('/detail/{id}', "CommentController@destroy") ->name("comment.destroy");  

