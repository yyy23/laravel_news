<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model  //Modelを継承してpostクラス作成

{
    // 投稿は複数のコメントを持つ[一対多]

    public function comments()  
    { 
		
        return $this ->hasMany('App\Models\Comment'); //Commentモデルを複数返す
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
