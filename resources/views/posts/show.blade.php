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
        <div>
          @if($post->is_liked_by_auth_user())
            <a href="{{ route('post.unlike', ['id' => $post->id])}}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
          @else
            <a href="{{ route('post.like', ['id' => $post->id])}}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
          @endif
        </div>
        <div class="footer">
            <button><a href="/">戻る</a></button>
            <hr>
            <h3>コメント</h3>
            @foreach($comments as $comment)
            @if($comment->post_id === $post->id)
            <hr>
                <p>コメント投稿者：{{$comment->user->name }}</p>
                <p>コメント内容：{{$comment->contents}}</p>
            @endif
            @endforeach
            <button><a href = '/posts/{{$post->id}}/comments'>コメントを全て見る</a></button>
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
