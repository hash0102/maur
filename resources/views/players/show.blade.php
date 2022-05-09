@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQueryPlayer.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/playerShow.css') }}">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <div class= "players-show">
        <p class="player-name">選手名：{{ $player->first_name }} {{ $player->last_name}}</p>
        <div>
        <img src = "{{$player->image}}" class="player-image">
        </div>
        <div class= "content">
            <p>チーム：<img src = "{{$player->team->image}}" class="team-image">    {{$player->team->state_name }} {{$player->team->name }}</p>
            <p>背番号：{{ $player->jersey }}</p>
            <p>身長：{{round($player->height,1)}} cm <span class="weight">体重：{{round($player->weight,1)}} kg</span></p>
            <p>ポジション：{{$player->position}}</p>
            <p>誕生日：{{$player->birthday}}</p>
            <p>出身国：{{$player->birthcountry}} <span class="city">出身：{{$player->birthcity}}</span></p>
            @if($player->highschool == 'No Data')
                <p>大学：{{$player->college}} 大学</p>
            @else
                <p>高校：{{$player->highschool}}　高校</p>
            @endif
            <p>プロ歴：{{$player->experience}} 年</p>
            <p>年俸：{{$player->salary}} ドル</p>
        </div>
        <hr>
        <div class="button">
            <a href = "/" class="back-latest"><i class="fa-solid fa-arrow-right-to-bracket"></i>  最新の投稿に戻る</a>
            <a href = "/ranking"class="back-ranking"><i class="fa-solid fa-arrow-right-to-bracket"></i>  ランキングに戻る</a>
        </div>
    </div>
    </body>
</html>
@endsection