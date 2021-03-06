@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>NBA MAUR</title>
        <script src = "{{ mix('js/jQueryRankingLike.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/rankingIndex.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1><span><i class="fa-solid fa-ranking-star"></i></span>今シーズンのMy 1stチーム</h1>
        <div class="button">
            <a href = "/ranking/create" class="ranking-create"><i class="fa-solid fa-crown"></i></a>
            <a href='/users'class="my-page"><i class="fa-solid fa-user-pen"></i></a>
            <a href='/players'class="players"><i class="fa-solid fa-people-group"></i></a>
            <a href = '/'class="home"><i class="fa-solid fa-house"></i></a>
            <a href = "/users/profile/mypage" class='my-account'><i class="fa-solid fa-circle-user"></i></a>
            <a href='/teams' class='teams-page'><i class="fas fa-user-friends"></i></a>
        </div>
        <hr>
        <div class = 'contents'>
            @if($rankings->isEmpty())
                <p>現在投稿はございません。</p>
            @else
            <div class="ranking-players-content">
            @foreach($rankings as $ranking)
                @foreach($ranking->players as $player)
                    <div class = 'player-content'>
                        <p class="player-name">{{$player->position}}：{{$player->first_name}} {{$player->last_name}}</p>
                        <img src = "{{$player->image}}" class="player-image">
                        <p class="belongs-team">所属チーム：<img src = "{{$player->team->image}}" class="team-image"><span class="state_name" >{{$player->team->state_name }} </span> {{$player->team->name}}</p>
                        <button class="player-button"><a href="/players/{{ $player->id }}"><i class="fa-solid fa-user"></i>   選手詳細</a></button>
                        <br>
                    </div>
                @endforeach
            </div>
                <div class = "reason">
                    <p>ランキング理由：{{$ranking->contents}}</p>
                </div>
                <div id=like>
                    @auth
                    @if (!$ranking->isRankingLikedBy(Auth::user()))
                        <p>Favorite :
                            <span class="likes">
                                <i class="fa-solid fa-crown like-toggle" data-ranking-id="{{ $ranking->id }}"></i>
                                <span class="like-counter">{{$ranking->rankinglikes_count}}</span>
                            </span>
                        </p>
                    @else
                        <p>Favorite :
                            <span class="likes">
                                <i class="fa-solid fa-crown like-toggle liked" data-ranking-id="{{ $ranking->id }}"></i>
                                <span class="like-counter">{{$ranking->rankinglikes_count}}</span>
                            </span>
                        </p>
                    @endif
                    @endauth
                </div>
                <hr>
                <div class= "user-contents">
                    <p class="poster">投稿者名：<img src= "{{$ranking->user->image}}" class="user-image">{{$ranking->user->name}}</p>
                    @if($ranking->user->team_id == NULL)
                        <p class="favorite-team">投稿者のお気に入りのチーム：未設定</p>
                    @else
                        <p class="favorite-team">投稿者のお気に入りチーム：<img src="{{$ranking->user->team->image}}" class="team-image2">{{$ranking->user->team->state_name}} {{$ranking->user->team->name}}</p>
                    @endif
                    <p>投稿日付：{{$ranking->created_at}}</p>
                    <form action="/ranking/{{ $ranking->id }}" id="form_{{ $ranking->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    @if($ranking->user_id === \Auth::user()->id)
                        <input type ="submit" style = "display:none">
                        <button class = 'delete'><i class="fa-solid fa-trash-can"></i></button>
                    @endif
                    </form>
                </div>
        </div>
        <hr>
        @endforeach
        @endif
        <div class='paginate'>
            {{ $rankings->links() }}
        </div>
    </body>
</html>
@endsection