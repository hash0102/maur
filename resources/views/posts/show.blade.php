@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src = "{{ mix('js/jQueryPostDelete.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/postShow.css') }}">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet"href="/css/app.css">
    </head>
    <body>
        <div class="content">
            <div class="content_post">
                <h2>投稿者：<img src="{{$post->user->image}}"  class="user-image">  {{ $post->user->name }}</h2>
                <br>
                <h3>選手名：{{ $post->player->first_name}} {{$post->player->last_name}}</h3>
                <p><img src = '{{$post->player->image }}' class="player-image"></p>
                <div class="reviews">
                    <p>オフェンス評価：{{$post->offense_review}}</p>
                    <p>ディフェンス評価：{{$post->defense_review}}</p>
                </div>
                <div class="reason">
                    <p>評価理由：{{ $post->content }}</p> 
                </div>
                <p class = "updated_at">投稿日付：{{$post->updated_at}}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/" class="back"><i class="fa-solid fa-arrow-right-to-bracket"></i>    戻る</a>
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
            <a href = '/posts/{{$post->id}}/comments'class="comments"><i class="fa-solid fa-comments">すべてのコメントを見る</i></a>
        </div>
    </body>
</html>
@endsection
