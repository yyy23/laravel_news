<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model   //Model継承してcommentクラス作成
{

    //コメントは１つの投稿に紐づく
    public function post()
    { 
		
       return $this ->belongsTo("App\Models\Post");  
	}


    //テーブル名
    protected $table = "comments";

    //可変項目(保存したい値）
    protected $fillable =
    [
        "comment_id",
        "post_id",
        "comment"
    ];
}