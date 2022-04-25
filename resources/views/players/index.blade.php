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
    <fotter>
        <div class = 'footer'>
            <div class = 'button'>
                <button><a href='/users'><i class="fa-solid fa-user-pen"></i>   自分の投稿</a></button>
                @if(Auth::user()->id === 1)
                <button class = 'player_create'><a href = '/players/create'>選手登録</a></button>
                @endif
                <button><a href = '/'><i class="fa-solid fa-house"></i>    HOME</a></button>
                <button><a href = '/ranking'><i class="fa-solid fa-ranking-star"></i>  ランキング</a></button>
            </div>
        </div>
    </fotter>
        <h1>選手一覧</h1>
        <hr>
         <div class ="team_Name">
                <p>チーム名</p>
                <select id = "teams">
                    <option value = "">チームを選択する</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                    @endforeach
                </select>
            </div>
        <div class='posts'>
        </div>

        <div class='posts2'>
            @foreach ($players as $player)
            <p>選手名：{{ $player->first_name }} {{ $player->last_name}}</p>
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
            <img src = "{{$player->image}}" width = 10%>
            <hr>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $players->links() }}
        </div>
        </div>
    </body>
</html>
@endsection