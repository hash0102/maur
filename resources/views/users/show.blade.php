@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src = "{{ mix('js/jQueryPostDelete.js') }}" defer></script>
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet"href="/css/app.css">
    </head>
    <body>
          <p>投稿者名：{{ $post->user->name }}</p>
        <div class="content">
            <div class="content__post">
            <p>選手名：{{ $post->player->first_name}} {{$post->player->last_name}}</p>
              <p><img src = '{{$post->player->image }}'></p>
                <p>評価理由：{{ $post->content }}</p> 
                <p>作成日：{{$post->updated_at}}</p>
            </div>
        </div>
        <div class="footer">
            <button><a href="/users">戻る</a></button>
            <form action="/users/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <input type ="submit" style = "display:none">
                <button class = 'delete'>削除</span></button>
            </form>
            <button><a href = '/users/{{$post->id}}/comments'>コメント一覧</a></button>
        </div>
    </body>
</html>
@endsection
