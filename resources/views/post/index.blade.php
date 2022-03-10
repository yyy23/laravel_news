<!DOCTYPE html>
<html lang="ja">
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scal=1.0"> <!--表示領域設定：端末画面の幅、初期ズーム倍率-->

  <title>Laravel-News</title>
</head> 

<header>
  <!--TOP画面へのリンク-->
  <div class="nav-bar">
  <a href="http://localhost/index.php">Laravel-News</a> 
</div>
</header>

<body>
  <h2>皆さんのトレンドニュースを教えてください★</h2>


  <form action= "index.php" method= "POST" onsubmit= "return check()" >  <!--ファイル、methodの指定-->
  @csrf

  <!--タイトル入力部分の作成-->
    <p> 
      <label for= "title">タイトル: </label>  

  <!-- タイトルエラーメッセージ  -->
      <input type= "text" name= "title" value= "{{ old('title') }}"> 
      @if ($errors->has('title'))
        @foreach ($errors->get('title') as $error)
            {{ $error}} <br>
        @endforeach
      @endif      
    </p>   

    <!--記事入力部分の作成-->
    <p>   
      <label for= "article">記事: </label> 

      <!-- 記事エラーメッセージ  --> 
        <textarea name= "article" cols= "25" rows= "6">{{ old('article') }}</textarea> 
        @if ($errors->has('article'))
          {{ $errors->first('article') }}<br>
        @endif
    </p>
    
    <!--投稿ボタンの作成-->
    <p> 
      <input type= "submit" name= "send_submit" value= "投稿"></p>  
  </form>

  <!-- 投稿内容の表示  -->
  <hr>
  @if (count($posts) > 0)   <!-- $postsがある場合、foreachで投稿数分を表示 -->
    @foreach ($posts as $post)
    <p><h2>{{ $post ->title }}</h2></p>
    <p>{{ $post->article }}</p>  
    <a href="{{ route('post.detail', $post ->id) }}"> 記事全文・コメントを読む</a>  <!--コメントページへのリンク作成 -->
    <hr>
    @endforeach
  @endif
  
  <!-- JavaScriptへのリンク -->
  <script src="{{ asset('/js/post.js') }}"></script>  

</body>
</html>