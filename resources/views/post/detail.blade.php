<!DOCTYPE html>
<html lang="ja">
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scal=1.0"> <!--表示領域設定：端末画面の幅、初期ズーム倍率-->

<title>Laravel-News</title>
</head> 

<header>
  <div class="nav-bar">
  <a href= "{{ route('post.index') }}"> Laravel-News</a> <!--TOP画面へのリンク-->
 </div>
</header> 

<body>

<!--  投稿の表示  -->
  <p><h2>{{ $post ->title }}</h2></p>  <!-- タイトル -->
  <p>{{ $post ->article }}</p>          <!-- 記事 -->
  <hr>


  <!-- コメント投稿 -->
  <form method= "POST" action= "{{ route('comment.store') }}" > 
  @csrf
    <input type="hidden" name="post_id" value= "{{$post ->id}}">  <!-- {post_id}を隠して詳細画面に渡す -->
    <p>コメント<textarea name= "comment" cols= "20" rows= "3"></textarea></p><br>  <!--コメント部分の作成-->
    <input type= "submit" name= "send_comment" value= "コメント追加">    <!-- コメント追加ボタン -->
  </form>
  <hr>  

  <!-- コメントの表示-->
  @foreach ($comments as $comment )  <!-- foreachでコメント数の分だけ表示させる -->
    <p>{{ $comment ->comment }}</p>

  <!-- コメント削除ボタン  -->
    <form method="POST" action= "{{ route('comment.destroy' , $comment->id) }}">  <!-- {$comment_id}を渡して'comment.destroy'を処理する -->
      @csrf
      <input type="hidden" name="id" value= "{{$post ->id}}"> <!-- {post_id}を隠して詳細画面に渡す -->
      <input type= "submit" name= "comment_delete" value= "削除">
      @method('DELETE')
    </form>  
  <hr>
  @endforeach

</body>
</html> 
