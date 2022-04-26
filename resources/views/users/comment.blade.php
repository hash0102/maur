@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src = "{{ mix('js/jQueryCommentLike.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
        <title>コメント一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet"href="/css/app.css">
    </head>
    <body>
        <div class = 'comment_contents'>
            @if($comments->isEmpty())
            <p>現在コメントはございません。</p>
            @else
        @foreach($comments as $comment)

          <p>投稿内容：{{$comment->post->content}}</p>
          <p>投稿者名：{{$comment->post->user->name}}</p>
          <p>ユーザー名：{{$comment->user->name}}</p>
          <p>コメント内容：{{$comment->contents}}</p>
          <p>コメント日付：{{$comment->created_at}}</p>

           @auth
              @if (!$comment->isCommentLikedBy(Auth::user()))
                     <span class="likes">
                        <i class="fa-solid fa-thumbs-up like-toggle" data-comment-id="{{ $comment->id }}"></i>
                      <span class="like-counter">{{$comment->commentlikes_count}}</span>
                    </span>
               @else
                <span class="likes">
                    <i class="fa-solid fa-thumbs-up like-toggle liked" data-comment-id="{{ $comment->id }}"></i>
                    <span class="like-counter">{{$comment->commentlikes_count}}</span>
                </span>
               @endif
               @endauth
               @guest
                <span class="likes">
                    <i class="fa-solid fa-thumbs-up"></i>
                    <span class="like-counter">{{$comment->commentlikes_count}}</span>
                </span>
               @endguest
          <hr>
        @endforeach
         @endif
        </div>
        
        <div class="footer">
         <button><a href="/users/{{$post->id}}">戻る</a></button
        </div>
    </body>
</html>
@endsection