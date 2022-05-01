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
        <link rel="stylesheet"href="/css/app.css">
    </head>
    <body>
        <div class = 'comment_contents'>
            @if($comments->isEmpty())
            <p>現在コメントはございません。</p>
            @else
        @foreach($comments as $comment)
        
          <h2>投稿内容：{{$comment->post->content}}</h2>
          <p>投稿者名：{{$comment->post->user->name}}</p>
          <p>ユーザー名：{{$comment->user->name}}</p>
          @if($comment->user->team_id == NULL)
            <p>ユーザーのお気に入りのチーム：未設定</p>
            @else
            <p>ユーザーのお気に入りのチーム：<img src="{{$comment->user->team->image}}" width = 1.25% height= 10%> {{$comment->user->team->state_name }} {{$comment->user->team->name}}</p>
            @endif
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
               
           <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                @if($comment->user_id === \Auth::user()->id)
                <input type ="submit" style = "display:none">
                <button class = 'delete'>削除</span></button>
                @endif
            </form>
            <hr>
        @endforeach
        @endif
        </div>
         <div class='paginate'>
            {{ $comments->links() }}
        </div>
        <div class = "comment_create">
            @if(\Auth::user()->id != $post->user_id)
         <button><a href='/posts/comments/create/{{$post->id}}'><i class="fa-solid fa-comment"></i>コメントを書く</a></button>
        </div>
            @endif
        <div class="footer">
         <button><a href="/posts/{{$post->id}}"><i class="fa-solid fa-arrow-right-to-bracket"></i>   戻る</a></button>
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