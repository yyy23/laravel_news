<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller  //Controllerを継承してpossControllerのクラス作成
{

    /* 投稿一覧を表示  */
    

    public function index()
    {
      
      $posts = Post::orderBy('id', 'desc') ->get();  // SELECT * FROM posts orderby id desc
    
      return view("post.index", ["posts" => $posts] );  //$postsで受け取ったデータをpostsに渡してpost.indexに配列で渡したものをviewに返す
    }


    /*  投稿内容の保存 */
    
    public function store(Request $request)  //Requetのデータは$requestとして呼び出して、DBへ保存
    {

      //  バリデーション設定

      $this-> validate ($request,   
        [
          "title"   => 'required|string|max:30',  //入力必須、最大30文字
          "article" => 'required|string'        //入力必須
        ],
        
          [  // 日本語化
            "title.required"     => 'タイトルは必須です',  
            "title.max"       => 'タイトルは最大30文字です',  
            "article.required"   => '記事は必須です'        
          ]
        );

        
        $savedata = [  //DBへの保存内容
          "id" => $request -> id,
          "title" => $request -> title,
          "article" => $request -> article
        ];

        $post = new Post;    //新規投稿
        $post ->fill($savedata) ->save();  //内容を保存
      
      return redirect("/");   //投稿一覧へリダイレクト
      
    }
    
}
    

    



