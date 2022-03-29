<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <fotter>
        <div class = 'footer'>
            <div class = 'button'>
                <button><a href='/users/index'></a>USER</button>
                <button class = 'login'>LOGIN</button>
                <button class = 'player_create'><a href = '/players/create'>選手登録</a></button>
                <button><a href = '/'>投稿一覧へ戻る</a></button>
            </div>
            <select id = "team">
                @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->abname }}</option>
                @endforeach
            </select>
            </div>
        </div>
    </fotter>
        <h1>選手一覧</h1>
       

        <div class='posts'>
            @foreach ($players as $player)
            <p>選手名：{{ $player->first_name }} {{ $player->last_name}}</p>
            <p>チーム：{{$player->team->state_name }} {{$player->team->name }}</p>
            <p>ポシション： {{ $player->position->name }}</p>
            <img src = "{{$player->image}}" width="30%" height="50%">
            <ul>今シーズンのスタッツ</ul>
            <li>PPG：{{ $player->PPG }}</li>
            <li>RPG：{{ $player->RPG }}</li>
            <li>APG：{{ $player->APG }}</li>
            <li>MPG：{{ $player->MPG }} 分</li>
            <li>FG：{{ $player->FG }}％</li>
            <li>3P：{{ $player->three_point }}％</li>
            <li>FT：{{ $player->FT }}%</li>
            <hr>
            @endforeach
        </div>
        </div>
    </body>
</html>
