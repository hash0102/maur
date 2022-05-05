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
        <h1><span><i class="fa-solid fa-house"></i></span>最新の投稿</h1>
            <div class='button'>
                <a href='/users' class='my-page'><i class="fa-solid fa-user-pen"></i></a>
                <a href='/players' class='players'><i class="fa-solid fa-people-group"></i></a>
                <a href='posts/create'class='create'><i class="fa-solid fa-circle-plus"></i></a>
                <a href = '/ranking'class='ranking'><i class="fa-solid fa-ranking-star"></i></a>
                <a href = "/users/profile/mypage" class='my-account'><i class="fa-solid fa-circle-user"></i></a>
            </div>
        <div class ="team_Name">
            <p>チーム名：</p>
            <div>
                <select id = "team">
                    <option value = "" class = 'option'>チームを選択する</option>
                @foreach($teams as $team)
                    <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class='posts'>
        </div>
        <div class = 'posts2'>
            @if($posts->isEmpty())
                <p>現在投稿はございません。</p>
            @else
            @foreach ($posts as $post)
                <p class="name">選手名：{{ $post->player->first_name }} {{ $post->player->last_name}}</p>
                <img src = '{{ $post->player->image }}' class = "player-image">
                <div class = "contents">
                    <p id="player-team">チーム：<img src = "{{$post->player->team->image}}" class="team-image">  {{$post->player->team->state_name }} {{$post->player->team->name }}</p>
                    <p id="player-position">ポシション： {{ $post->player->position }}</p>
                    <div class="reviews">
                        <p class="of-review">オフェンス評価：<span class="review-point">{{ $post->offense_review }}</span></p>
                        <p class="df-review">ディフェンス評価：<span class="review-point">{{ $post->defense_review }}</span></p>
                    </div>
                </div>
                <div class = "reason">
                    <p>評価理由：{{$post->content}}</p>
                </div>
                <div id = 'likes'>
                @auth
                @if (!$post->isLikedBy(Auth::user()))
                <p>Favorite : 
                    <span class="likes">
                        <i class="fa-solid fa-basketball like-toggle" data-post-id="{{ $post->id }}"></i>
                        <span class="like-counter">{{$post->likes_count}}</span>
                    </span>
                </p>
                @else
                <p>Favorite :
                <span class="likes">
                    <i class="fa-solid fa-basketball like-toggle liked" data-post-id="{{ $post->id }}"></i>
                    <span class="like-counter">{{$post->likes_count}}</span>
                </span>
                </p>
                @endif
                @endauth
            </div>
            <hr>
            <div class="poster-content">
                <p class="poster">投稿者：<img src = "{{$post->user->image}}" class="user-image">   {{$post->user->name }}</p>
                @if($post->user->team_id == NULL)
                    <p>投稿者のお気に入りのチーム：未設定</p>
                @else
                    <p>投稿者のお気に入りのチーム：<img src="{{$post->user->team->image}}" class="team-image"> {{$post->user->team->state_name }} {{$post->user->team->name}}</p>
                @endif
                <p>投稿日付：{{$post->created_at}}</p>
                <a href="/posts/{{ $post->id }}" class="posts_info"><i class="fa-solid fa-angles-right"></i>    投稿詳細</a>
                <a href="/players/{{ $post->player_id }}"class="players_info"><i class="fa-solid fa-user"></i>   選手詳細</a>
            </div>
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