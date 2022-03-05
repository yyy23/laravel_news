<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class CommentController extends Controller  //COntrollerを経由してCommentControllerクラス作成
{

    /*  記事の詳細表示  */

  public function detail($id)  //indexのidを呼び出して詳細表示
    {

      $post = Post::findOrFail($id); //　$postはPostモデルからIDがあれば表示、なければfalse
      $comments = Comment::where('post_id', '=', $id)  // SELECT * FROM posts where post_id = '$id'
                  ->orderBy('id', 'desc') ->get();  //$commentsはpost_idと$idが一致するものを降順で取得

        if(!$post) {  //IDが取得できないときは一覧画面へリダイレクト
      
        return redirect("post.detail");  // "post.detail"ページに転送
      }

      return view("post.detail" ,["post" => $post, "comments" =>$comments] );  // 保存した値を(post,comments)を連想配列として"post.detail"ページに表示
    }


       /*   コメントの保存  */

    public function store(Request $request)
    {

      $savedata = [  //保存するデータ
        "post_id" => $request -> post_id,
        "comment" => $request -> comment
      ];

      $comment = new Comment;
      $comment -> fill($savedata) ->save();
    
      return redirect()->route('post.detail' , [$savedata['post_id']] );
    
    }


      /*  コメントの削除  */

    public function destroy($comment_id)   
    {
      $comment = Comment::findOrFail($comment_id);
      $comment ->delete();  //削除
      
      // dd($comment);
 
      return redirect() ->route('post.detail' , [$comment['post_id']] );

    }
}