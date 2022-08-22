@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/playerByTeam.css') }}">
    </head>
    <body>
            <div class="team_contents">
                <div class ="team">
                    @foreach($teams as $team)
                    <p>チーム：<span class="team_image"><img class="team-image" src = "{{$team->image}}"></span>    {{$team->state_name }} {{$team->name }}</p>
                    @endforeach
                </div>
                <hr>
                @foreach($players as $player)
                <div class="player-image-content">
                    <p class="player-name">選手名：{{ $player->first_name }} {{ $player->last_name}}</p>
                    <img class="player-image" src = "{{$player->image}}">
                </div>
                <div class="player-contents">
                    <p>背番号： {{ $player->jersey }}</p>
                    <p>身長：{{round($player->height,1)}} cm  <span class='weight'>体重：{{round($player->weight,1)}} kg</span></p>
                    <p>ポジション：{{$player->position}}</p>
                    <p>誕生日：{{$player->birthday}}</p>
                    <p>出身国：{{$player->birthcountry}}<span class="city">：{{$player->birthcity}}</span></p>
                    @if($player->highschool == 'No Data')
                        <p>大学：{{$player->college}} Univ.</p>
                    @else
                        <p>高校：{{$player->highschool}}　H.S.</p>
                    @endif
                    <p>プロ歴：{{$player->experience}} 年</p>
                    <p>年俸：{{$player->salary}} ドル</p>
                </div>
                <hr>
                @endforeach
            </div>
            <div class="button">
                <a href ="/teams" class="back">戻る</a>
            </div>
            <div class='paginate'>
            {{ $players->links() }}
            </div>
        </div>

    </body>
</html>
@endsection