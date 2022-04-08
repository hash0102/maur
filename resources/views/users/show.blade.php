@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet"href="/css/app.css">
    </head>
    <body>
            ユーザー：{{ $post->user->name }}
        <div class="content">
            <div class="content__post">
                {{ $post->player->first_name}} {{$post->player->last_name}}
                <img src = '{{$post->player->image }}'>
                <p>{{ $post->content }}</p> 
                <p class = "updated_at">{{$post->updated_at}}</p>
            </div>
        </div>
        <div class="footer">
            <button><a href="/users">戻る</a></button>
            <button><a href = '/users/{{$post->id}}/comments'>コメント一覧</a></button>
            <!--<form action = "/posts/{{$post->id}}" id= "form_delete" method= "POST">-->
            <!--    @csrf-->
            <!--    @method('DELETE')-->
            <!--    <input type ="submit" style = "display:none">-->
            <!--    <button class = 'delete'><span onclick = "return deletePost(this);">削除</span></button>-->
            <!--</form>-->
        </div>
    </body>
</html>
@endsection
