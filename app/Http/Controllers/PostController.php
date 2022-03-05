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
    
    public function store(Request $request)
    {

      $this->validate($request,   //  バリデーション設定
        [
          "title"   => 'required|string|max:30',  //入力必須、最大30文字
          "article" => 'required|string'        //入力必須
        ],
        
          [ //  日本語化
            "title.required"     => 'タイトルは必須です',  
            "title.max"       => 'タイトルは最大30文字です',  
            "article.required"   => '記事は必須です'        
          ]
        );

        
        $savedata = [//保存内容
          "id" => $request -> id,
          "title" => $request -> title,
          "article" => $request -> article
        ];

        $post = new Post;  
        $post ->fill($savedata) ->save();
      
      return redirect("/");   //投稿一覧へリダイレクト
      
    }
    
}
    

    



