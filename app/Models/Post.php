<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model  //Modelを引き継いだPossクラスを使えばpostsテーブルの中の２つ空を扱うことができる

{
    // 投稿はたくさんのコメントを持つ
    // public function Comments(){ 
		
	// 	return $this->hasMany('Comment', 'post_id');
	// }


    //テーブル名
    protected $table = "posts";

    //可変項目(保存したい値）
    protected $fillable =
    [
        "id",
        "title",
        "article"
    ];
}
