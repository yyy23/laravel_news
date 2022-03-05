<!DOCTYPE html>
<html lang="ja">
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scal=1.0"> <!--表示領域設定：端末画面の幅、初期ズーム倍率-->

<title>Laravel-News</title>
</head> 

<header>
  <div class="nav-bar">
  <a href="http://localhost/index.php">Laravel-News</a> <!--TOP画面へのリンク-->
 </div>
</header> 

<body>

<!--  記事の表示  -->
  <p><h2>{{ $post ->title }}</h2></p>
  <p>{{ $post ->article }}</p>
  <hr>


  <!-- コメント投稿 -->
  <form action= "" method= "POST"> 
  @csrf
    <input type="hidden" name="post_id" value= "{{$post ->id}}">
    <p>コメント<textarea name= "comment" cols= "20" rows= "3"></textarea></p><br>  <!--記事入力部分の作成-->
    <input type= "submit" name= "send_comment" value= "コメント追加">  
  </form>
  <hr>  
  @foreach ($comments as $comment )
    <p>{{ $comment ->comment }}</p>


  <!-- コメント削除ボタン  -->
    <form action= "{{ route('comment.destroy' , $comment->id) }}" method="POST">
      @csrf
      <input type="hidden" name="id" value= "{{$post ->id}}">
      <input type= "submit" name= "comment_delete" value= "削除">
      @method('DELETE')
    </form>  
  <hr>
  @endforeach
  
  
</body>
</html> 
