@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>コメント一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet"href="/css/app.css">
    </head>
    <body>
        <div class = 'comment_contents'>
        @foreach($comments as $comment)
          <p>投稿内容：{{$comment->post->content}}</p>
          <p>投稿者名：{{$comment->post->user->name}}</p>
          <p>ユーザー名：{{$comment->user->name}}</p>
          <p>コメント内容：{{$comment->contents}}</p>
          <p>コメント日付：{{$comment->created_at}}</p>
          <hr>
        @endforeach
        </div>
        
        <div class = "comment_create">
            @if(\Auth::user()->id != $post->user_id)
         <button><a href =  '/posts/comments/create/{{$post->id}}'>コメントを投稿する</a></button>
        </div>
            @endif
        <div class="footer">
         <button><a href="/posts/{{$post->id}}">戻る</a></button>
            <!--<form action = "/posts/" id= "form_delete" method= "POST">-->
            <!--    @csrf-->
            <!--    @method('DELETE')-->
            <!--    <input type ="submit" style = "display:none">-->
            <!--    <button class = 'delete'><span onclick = "return deletePost(this);">削除</span></button>-->
            <!--</form>-->
        </div>
    </body>
</html>
@endsection