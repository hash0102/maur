@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQueryUser.js') }}" defer></script>
        <script src = "{{ mix('js/jQueryLike.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/maurIndex.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1><span><i class="fa-solid fa-user-pen"></i></span>自分の投稿</h1>
        <div class = 'button'>
            <a href = '/' class="home"><i class="fa-solid fa-house"></i></a>
            <a href = '/players'class='players'><i class="fa-solid fa-people-group"></i></a>
            <a href = '/posts/create' class='create'><i class="fa-solid fa-circle-plus"></i></a>
            <a href = '/ranking' class='ranking'><i class="fa-solid fa-ranking-star"></i></a>
            <a href = "/users/profile/mypage" class='my-account'><i class="fa-solid fa-circle-user"></i></a>
        </div>
        <div class ="team_Name">
            <p>チーム名：</p>
            <div>
                <select id = "team">
                    <option value = "" class = 'option'>チームを選択する</option>
                    @foreach($teams as $team)
                        <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class='posts'>
        </div>
        <div class='posts2'>
            @if($posts->isEmpty())
                <p>現在投稿はございません。</p>
            @else
            @foreach ($posts as $post)
                <p class="name">選手名：{{ $post->player->first_name }} {{ $post->player->last_name}}</p>
                <img src = "{{$post->player->image }}" class = "player-image">
                <div class = "contents">
                    <p>チーム：<img src = "{{$post->player->team->image}}" width = 1.25% height= 10%>   {{$post->player->team->state_name }} {{$post->player->team->name }}</p>
                    <p>ポシション： {{ $post->player->position }}</p>
                    <div class="reviews">
                    <p>オフェンス評価：{{ $post->offense_review }}</p>
                    <p>ディフェンス評価：{{ $post->defense_review }}</p>
                    </div>
                </div>
                <div class = "reason">
                    <p>評価理由：{{$post->content}}</p>
                </div>
                <div id =  "likes">
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
                    @guest
                        <p>Favorite :
                            <span class="likes">
                                <i class="fa-solid fa-basketball"></i>
                                <span class="like-counter">{{$post->likes_count}}</span>
                            </span>
                        </p>
                    @endguest
                </div>
                <div class="footer">
                    <a href="/users/{{ $post->id }}"class="posts_info"><i class="fa-solid fa-angles-right"></i>投稿詳細</a>
                    <a href="/players/{{ $post->player_id }}"class="players_info"><i class="fa-solid fa-angles-right"></i>選手詳細</a>
                </div>
            <hr>
            @endforeach
            @endif
        </div>
        <div class='paginate'>
        <hr>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection