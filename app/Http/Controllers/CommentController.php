<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class CommentController extends Controller  //COntrollerを継承してCommentControllerクラス作成
{

    /*  記事の詳細表示  */

    public function detail($id)  //indexのidを呼び出して詳細表示
    {

      $post = Post::findOrFail($id);  //$postはPostモデルからIDがあれば表示、なければfalse
      $comments = Post::find($id) ->comments() ->orderBy('id', 'desc') ->get();  //$commentsはPostモデルからIDを見つけて降順で取得

      if(!$post) {  //IDが取得できないときは一覧画面へリダイレクト
      
        return redirect("post.detail");  // "post.detail"ページに転送
      }

      return view("post.detail" ,["post" => $post, "comments" =>$comments] );  // 保存した値を(post,comments)を連想配列として"post.detail"ページに表示
    }


    //コメント追加、削除はPostモデルいらない、どうやってcommnetモデルを呼び出すか

       /*   コメントの保存  */  

    public function store(Request $request)  //Requetのデータは$requestとして呼び出して、DBへ保存
    {

      $savedata = [  //DBへ保存内容
        "post_id" => $request ->post_id,
        "comment" => $request ->comment,
      ];
      
      $comment = new Comment;   //新規コメント
      $comment ->fill($savedata) ->save();  //保存内容を保存
    
      // post_idを渡して詳細ページへリダイレクト
      return redirect() ->route('post.detail' , [$savedata['post_id']]);
    
    }

      /*  コメントの削除  */

    public function destroy($comment_id)   //$comment_idを呼び出して削除処理
    {
      $comment = Comment::findOrFail($comment_id);   // DELETE * FROM comments where id = 〇〇
      $comment ->delete();  //コメント削除
      
 
      //post_idを渡して詳細ページへリダイレクト
      return redirect() ->route('post.detail' , [$comment['post_id']] );

    }
}