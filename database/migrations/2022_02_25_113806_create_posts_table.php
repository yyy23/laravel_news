<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration    //Migrationクラスを継承してPostsTableクラス作成
{
    
    public function up()    //マイグレーションの実行、作成記述
    {
        Schema::create('posts', function (Blueprint $table) {  //postsデーブルにカラム作成
            $table->id();                  //IDを自動生成
            $table->string('title', 30);   //titleは30文字以内の文字列  
            $table->text('article');       //articleはテキスト型
            $table->timestamps();          //時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  //マイグレーションの削除
    {
        Schema::dropIfExists('posts');  //postテーブルが存在していれば削除処理
    }
    
}
