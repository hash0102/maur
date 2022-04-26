@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src = "{{ mix('js/jQueryRankingLike.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/rankingIndex.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>今シーズンのMy 1stチーム</h1>
        
        <button><a href = "/ranking/create"> <i class="fa-solid fa-crown"></i>   ランキング作成</a></button>
        <button><a href='/users'><i class="fa-solid fa-user-pen"></i>    自分の投稿</a></button>
        <button><a href='/players'><i class="fa-solid fa-people-group"></i>    選手詳細</a></button>
        <button><a href = '/'><i class="fa-solid fa-house"></i>    HOME</a></button>
    <hr>
    <div class = 'contents'>
        @if($rankings->isEmpty())
        <p>現在投稿はございません。</p>
            @else
        @foreach($rankings as $ranking)
            <p>投稿者名：{{$ranking->user->name}}</p>
        @foreach($ranking->players as $player)
            <p>{{$player->position}}：{{$player->first_name}} {{$player->last_name}}</p>
            <img src = "{{$player->image}}">
            <p>所属チーム：<img src = "{{$player->team->image}}" width = 1.25% height= 10%> {{$player->team->state_name }}  {{$player->team->name}}</p>
            <button><a href="/players/{{ $player->id }}"><i class="fa-solid fa-user"></i>   選手詳細</a></button>
        @endforeach
        
        <div class = "reason">
        <p>ランキング理由：{{$ranking->contents}}</p>
        </div>
        <p>投稿日付：{{$ranking->created_at}}</p>
        
        <form action="/ranking/{{ $ranking->id }}" id="form_{{ $ranking->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            @if($ranking->user_id === \Auth::user()->id)
            <input type ="submit" style = "display:none">
            <button class = 'delete'>削除</span></button>
            @endif
        </form>
        
        @auth
              @if (!$ranking->isRankingLikedBy(Auth::user()))
                     <span class="likes">
                        <i class="fa-solid fa-crown like-toggle" data-ranking-id="{{ $ranking->id }}"></i>
                      <span class="like-counter">{{$ranking->rankinglikes_count}}</span>
                    </span>
               @else
                <span class="likes">
                    <i class="fa-solid fa-crown like-toggle liked" data-ranking-id="{{ $ranking->id }}"></i>
                    <span class="like-counter">{{$ranking->rankinglikes_count}}</span>
                </span>
               @endif
               @endauth
               @guest
                <span class="likes">
                    <i class="fa-solid fa-crown"></i>
                    <span class="like-counter">{{$ranking->rankinglikes_count}}</span>
                </span>
               @endguest
               <hr>
        @endforeach
        @endif
        
    </div>
            <div class='paginate'>
            {{ $rankings->links() }}
        </div>
        
    </body>
</html>
@endsection