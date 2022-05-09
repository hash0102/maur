@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQueryPlayer.js') }}" defer></script>
        <script src = "{{ mix('js/jQueryPlayerSearch.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/playerIndex.css') }}">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1><span><i class="fa-solid fa-people-group"></i></span>選手一覧</h1>
        <div class = 'footer'>
            <div class = 'button'>
                <a href='/users' class='my-page'><i class="fa-solid fa-user-pen"></i></a>
                <a href = '/'class="home"><i class="fa-solid fa-house"></i></a>
                <a href = '/ranking'class="ranking"><i class="fa-solid fa-ranking-star"></i></a>
                <a href = "/users/profile/mypage" class='my-account'><i class="fa-solid fa-circle-user"></i></a>
            </div>
        </div>
        <div class ="team_Name">
            <p>チーム名：</p>　　　
            <div>
                <select id = "teams">
                    <option value = "">チームを選択する</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="search-wrapper">
            <p class="team-select-tag">選手名：</p>
            <div class="user-search-form">
                <input type = "text" id = 'search_name'  placeholder="選手を検索する">
                <button class = 'search-icon'><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
        <div>
            <p class="attention">(※苗字または名前のみで検索ください。)</p>
        </div>
        <hr>
        <div class='posts'>
        </div>
        <div class='posts2'>
            @foreach ($players as $player)
                <div class="player-image-content">
                    <p class="player-name">選手名：{{ $player->first_name }} {{ $player->last_name}}</p>
                    <img class="player-image" src = "{{$player->image}}">
                </div>
                <div class="player-contents">
                    <p>チーム：<span class="team_image"><img class="team-image" src = "{{$player->team->image}}"></span>    {{$player->team->state_name }} {{$player->team->name }}</p>
                    <p>背番号： {{ $player->jersey }}</p>
                    <p>身長：{{round($player->height,1)}} cm  <span class='weight'>体重：{{round($player->weight,1)}} kg</span></p>
                    <p>ポジション：{{$player->position}}</p>
                    <p>誕生日：{{$player->birthday}}</p>
                    <p>出身国：{{$player->birthcountry}}<span class="city">出身：{{$player->birthcity}}</span></p>
                    @if($player->highschool == 'No Data')
                        <p>大学：{{$player->college}} 大学</p>
                    @else
                        <p>高校：{{$player->highschool}}　高校</p>
                    @endif
                    <p>プロ歴：{{$player->experience}} 年</p>
                    <p>年俸：{{$player->salary}} ドル</p>
                </div>
                <hr>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $players->links() }}
        </div>
    </body>
</html>
@endsection