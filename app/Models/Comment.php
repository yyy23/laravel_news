<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model  //Modelを引き継いだCommentクラスを使えばcommentsテーブルの中の２つ空を扱うことができる
{
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