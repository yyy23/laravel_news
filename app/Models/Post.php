<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model  //Modelを継承してpostクラス作成

{
    // 投稿はたくさんのコメントを持つ

    public function comments()
    { 
		
       return $this ->hasMany("App\Models\Comment");
	}


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
