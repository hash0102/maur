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
          <p>投稿内容：{{$comment->post->content }}</p>
          <p>投稿者名：{{$comment->post->user->name}}</p>
          <p>ユーザー名：{{$comment->user->name}}</p>
          <p>コメント内容：{{$comment->contents}}</p>
          <hr>
        @endforeach
        </div>
        
        <div class="footer">
         <button><a href="/users/{{$post->id}}">戻る</a></button
        </div>
    </body>
</html>
@endsection
