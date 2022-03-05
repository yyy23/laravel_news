<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller  //laravelのControllerを継承してpossControllerのクラス作成
{
    /* 投稿一覧を表示
     
     * @return view  Controllerメソッドはviewを返す処理
     */

    public function index()
    {
      $posts = Post::orderBy('id', 'desc') ->get();
    
      return view("post.index", ["posts" => $posts] );  //$postsで受け取ったデータをpostsに渡してpost.indexブレードに配列で渡したものをviewに返す
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


      $savedata = [
         "id" => $request -> id,
         "title" => $request -> title,
         "article" => $request -> article
      ];

      $post = new Post;
      $post -> fill($savedata) ->save();
      
      return redirect("/");
      
    }
    
}
    

    



