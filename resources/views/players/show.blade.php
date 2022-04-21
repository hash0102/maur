@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQueryPlayer.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p>選手名：{{ $player->first_name }} {{ $player->last_name}}</p>
            <img src = "{{$player->image}}" width = 10%>
            <p>チーム：<img src = "{{$player->team->image}}" width = 1.25% height= 10%>    {{$player->team->state_name }} {{$player->team->name }}</p>
            <p>No.： {{ $player->jersey }}</p>
            <p>身長：{{$player->height}} cm</p>
            <p>体重：{{$player->weight}} kg</p>
            <p>ポジション：{{$player->position}}</p>
            <p>誕生日：{{$player->birthday}}</p>
            <p>出身国：{{$player->birthcountry}}</p>
            <p>出身：{{$player->birthcity}}</p>
            @if($player->highschool == 'No Data')
            <p>大学：{{$player->college}} 大学</p>
            @else
            <p>高校：{{$player->highschool}}　高校</p>
            @endif
            <p>プロ歴：{{$player->experience}} 年</p>
            <p>年俸：{{$player->salary}} ドル</p>
    </body>
    <button><a href = "/"><i class="fa-solid fa-arrow-right-to-bracket"></i>  戻る</a></button>
</html>
@endsection