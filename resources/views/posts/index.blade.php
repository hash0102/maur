@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQuery.js') }}" defer></script>
        <script src = "{{ mix('js/jQueryLike.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/maurIndex.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <fotter>
        <div class='footer'>
            <div class='button'>
                <button><a href='/users'><i class="fa-solid fa-user-pen"></i>    自分の投稿</a></button>
                <button><a href='/players'><i class="fa-solid fa-people-group"></i>    選手詳細</a></button>
                <button><a href='posts/create'><i class="fa-solid fa-circle-plus"></i>    投稿登録</a></button>
                <button><a href = '/ranking'><i class="fa-solid fa-ranking-star"></i>  ランキング</a></button>
            </div>
        </div>
        </div>
    </fotter>
        <h1>最新の投稿</h1>
        <div class ="team_Name">
            <p>チーム名</p>
            <select id = "team">
                <option value = "" class = 'option'>チームを選択する</option>
                @foreach($teams as $team)
                    <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                @endforeach
            </select>
            </div>
        <hr>
        <div class='posts'>
        </div>
        
        <div class='paginate2'>
        </div>
            
        <div class = 'posts2'>
            @if($posts->isEmpty())
            <p>現在投稿はございません。</p>
            @else
        @foreach ($posts as $post)
            <p class="name">選手名：{{ $post->player->first_name }} {{ $post->player->last_name}}</p>
            <p class = 'image'><img src = '{{ $post->player->image }}'></p>
            <p>チーム：<img src = "{{$post->player->team->image}}" width = 1.25% height= 10%>  {{$post->player->team->state_name }} {{$post->player->team->name }}</p>
            <p>ポシション： {{ $post->player->position }}</p>
            <p>オフェンス評価：{{ $post->offense_review }}</p>
            <p>ディフェンス評価：{{ $post->defense_review }}</p>
            <div class = "reason">
            <p>評価理由：{{$post->content}}</p>
            </div>
            <p>投稿者：{{$post->user->name }}</p>
            <p>投稿日付：{{$post->created_at}}</p>
              @auth
              @if (!$post->isLikedBy(Auth::user()))
                     <span class="likes">
                        <i class="fa-solid fa-basketball like-toggle" data-post-id="{{ $post->id }}"></i>
                      <span class="like-counter">{{$post->likes_count}}</span>
                    </span>
               @else
                <span class="likes">
                    <i class="fa-solid fa-basketball like-toggle liked" data-post-id="{{ $post->id }}"></i>
                    <span class="like-counter">{{$post->likes_count}}</span>
                </span>
               @endif
               @endauth
               @guest
                <span class="likes">
                    <i class="fa-solid fa-basketball"></i>
                    <span class="like-counter">{{$post->likes_count}}</span>
                </span>
               @endguest
            <button><a href="/posts/{{ $post->id }}"><i class="fa-solid fa-angles-right"></i>    投稿詳細</a></button>
            <button><a href="/players/{{ $post->player_id }}"><i class="fa-solid fa-user"></i>   選手詳細</a></button>
            <hr>
        @endforeach
        @endif
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    
    </body>
</html>
@endsection