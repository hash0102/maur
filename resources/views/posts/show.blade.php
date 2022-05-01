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
        <link rel="stylesheet"href="{{ asset('/css/app.css') }}" >
    </head>
    <body>
        <div class="content">
            <div class="content__post">
                <h2>投稿者：{{ $post->user->name }}</h2>
                <h3>選手名：{{ $post->player->first_name}} {{$post->player->last_name}}</h3>
                <p>オフェンス評価：{{$post->offense_review}}</p>
                <p>ディフェンス評価：{{$post->defense_review}}</p>
                <p>評価理由：{{ $post->content }}</p> 
                <p><img src = '{{$post->player->image }}'></p>
                <p class = "updated_at">{{$post->updated_at}}</p>
            </div>
        </div>
        
        
        <div class="footer">
            <button><a href="/"><i class="fa-solid fa-arrow-right-to-bracket"></i>    戻る</a></button>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                @if($post->user_id === \Auth::user()->id)
                <input type ="submit" style = "display:none">
                <button class = 'delete'><i class="fa-solid fa-trash-can"></i></button>
                @endif
            </form>
            <hr>
            <h3>コメント</h3>
            @foreach($comments as $comment)
           <p>コメント数：{{$comment->comments_count}}</p>
           @endforeach
        <a href = '/posts/{{$post->id}}/comments'><i class="fa-solid fa-comments"></i></a>
        </div>
    </body>
</html>
@endsection
