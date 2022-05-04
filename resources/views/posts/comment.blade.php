@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src = "{{ mix('js/jQueryCommentLike.js') }}" defer></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
        <title>コメント一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1><span><i class="fa-solid fa-comments"></i></span>コメント一覧</h1>
        <h2  class= "post-content">投稿内容：{{$post->content}}</h2>
        <p class= "poster">投稿者名：<img src = "{{$post->user->image}}" width=1.5% class="user-image">{{$post->user->name}}</p>
        <hr>
        @if($comments->isEmpty())
            <p>現在コメントはございません。</p>
        @else
        @foreach($comments as $comment)
            <div class="comment-contents">
                <p>コメント内容：{{$comment->contents}}</p>
            </div>
            <div class="commenter">
                <p class="comment-user">ユーザー名：<img src ="{{$comment->user->image}}" class="user-image">{{$comment->user->name}}</p>
                <p>コメント日付：{{$comment->created_at}}</p>
            @if($comment->user->team_id == NULL)
                <p>ユーザーのお気に入りのチーム：未設定</p>
            @else
                <p>ユーザーのお気に入りのチーム：<img src="{{$comment->user->team->image}}" width = 1.25% height= 10%> {{$comment->user->team->state_name }} {{$comment->user->team->name}}</p>
            @endif
            </div>
        <div id="likes">
            @auth
            @if (!$comment->isCommentLikedBy(Auth::user()))
            <p>いいね：
                <span class="likes">
                    <i class="fa-solid fa-thumbs-up like-toggle" data-comment-id="{{ $comment->id }}"></i>
                    <span class="like-counter">{{$comment->commentlikes_count}}</span>
                </span>
            </p>
            @else
            <p>いいね：
                <span class="likes">
                    <i class="fa-solid fa-thumbs-up like-toggle liked" data-comment-id="{{ $comment->id }}"></i>
                    <span class="like-counter">{{$comment->commentlikes_count}}</span>
                </span>
            </p>
            @endif
            @endauth
            @guest
            <p>いいね：
                <span class="likes">
                    <i class="fa-solid fa-thumbs-up"></i>
                    <span class="like-counter">{{$comment->commentlikes_count}}</span>
                </span>
            </p>
            @endguest
        </div>
        <div class= "delete-button">
            <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                @if($comment->user_id === \Auth::user()->id)
                    <input type ="submit" style = "display:none">
                    <button class = 'delete'><i class="fa-solid fa-trash-can"></i></button>
                @endif
            </form>
        </div>
        <hr>
        @endforeach
        @endif
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
        <div class = "footer">
            @if(\Auth::user()->id != $post->user_id)
                <a href='/posts/comments/create/{{$post->id}}'class="write-comment"><i class="fa-solid fa-comment"></i>コメントを書く</a>
            @endif
            <a href="/posts/{{$post->id}}"class='back'><i class="fa-solid fa-arrow-right-to-bracket"></i>   戻る</a>
        </div>
    </body>
</html>
@endsection