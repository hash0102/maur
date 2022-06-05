@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1">
                <script src = "{{ mix('js/jQueryTeamConference.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/teamIndex.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1><span><i class="fas fa-user-friends"></i></span>チーム情報</h1>
            <div class='button'>
                <a href='/users' class='my-page'><i class="fa-solid fa-user-pen"></i></a>
                <a href='/players' class='players'><i class="fa-solid fa-people-group"></i></a>
                <a href='posts/create'class='create'><i class="fa-solid fa-circle-plus"></i></a>
                <a href = '/ranking'class='ranking'><i class="fa-solid fa-ranking-star"></i></a>
                <a href = "/users/profile/mypage" class='my-account'><i class="fa-solid fa-circle-user"></i></a>
            </div>
            <hr>
            <div class="conference-select">
            <p class="conference-tag">カンファレンス：</p>　　　
                <div>
                    <select id = "conferences">
                        <option value = "">カンファレンスを選択する</option>
                        <option value="Western">Western</option>
                        <option value="Eastern">Eastern</option>
                    </select>
                </div>
            </div>
            <div class="team_contents2">
            </div>
        
            <div class="team_contents">
                @foreach($teams as $team)
                <img src= "{{$team->image}}" class="team-image">
                <div class="team-name">
                    <p class="state">州：{{$team->state_name}}</p>
                    <p class="state">チーム名：{{$team->name}}</p>
                    <p class="state">省略名：{{$team->abname}}</p>
                    <p>カンファレンス：{{$team->conference}}</p>
                    <div class="peformance">
                        <p>2022シーズンの成績</p>
                        <p>勝利数：{{$team->teamstat->win}}</p>
                        <p>敗北数：{{$team->teamstat->lose}}</p>
                    </div>
                </div>
                <a href = "/teams/players/{{$team->id}}" class="player-by-team">選手の情報を見る</a>
                 <hr>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $teams->links() }}
            </div>
    </body>
</html>
@endsection