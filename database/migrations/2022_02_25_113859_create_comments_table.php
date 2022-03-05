<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration    //Migrationクラスを継承してCommentsTableクラス作成
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  //マイグレーションの実行、作成記述
    {
        Schema::create('comments', function (Blueprint $table) {  //commentsデーブルにカラム作成
            $table->unsignedInteger('post_id');  //ポストテーブルとの紐付け
            $table->id();                        //IDは自動生成
            $table->text('comment');             //コメントはテキスト型
            $table->timestamps();                //時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //マイグレーションの削除
    {
        Schema::dropIfExists('comments');    //commentテーブルが存在していれば削除処理
    }
}
