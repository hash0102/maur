@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <script src = "{{ mix('js/jQueryCreateRanking.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/rankingCreate.css') }}">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>My1stチーム登録</title>
    </head>
    <body>
        <h1><span><i class="fa-solid fa-crown"></i></span>My1stチーム登録</h1>
        <form action="/ranking" method="POST">
            @csrf
            <div class = "pg_player_name">
                <h2>PG</h2>
                    <div class='pg_teams'>
                        <p>チーム：</p>
                        <div>
                            <select id = "pg_team_select">
                                <option value = "" class = 'option'>PGの選手の所属するチームを選択してください</option>
                            @foreach($teams as $team)
                                <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class = "pg_player2">
                        <select name="players_array[]" class = "pg_player_team3" id="pg_player_id" >
                        </select>
                    </div>
            </div>
            <br>
            <div class = "sg_player_name">
                <h2>SG</h2>
                <div class='sg_teams'>
                    <p>チーム：</p>
                    <div>
                        <select id = "sg_team_select">
                            <option value = "" class = 'option'>SGの選手の所属するチームを選択してください</option>
                        @foreach($teams as $team)
                            <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class = "sg_player2">
                    <select name="players_array[]" class = "sg_player_team3" id="sg_player_id">
                    </select>
                </div>
            </div>
            <br>
            <div class = "sf_player_name">
                <h2>SF</h2>
                <div class='sf_teams'>
                    <p>チーム：</p>
                    <div>
                        <select id = "sf_team_select">
                            <option value = "" class = 'option'>SFの選手の所属するチームを選択してください</option>
                        @foreach($teams as $team)
                            <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class = "sf_player2">
                    <select name="players_array[]" class = "sf_player_team3" id="sf_player_id">
                    </select>
                </div>
            </div>
            <br>
            <div class = "pf_player_name">
                <h2>PF</h2>
                <div class='pf_teams'>
                    <p>チーム：</p>
                    <div>
                        <select id = "pf_team_select">
                            <option value = "" class = 'option'>PFの選手の所属するチームを選択してください</option>
                        @foreach($teams as $team)
                            <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class = "pf_player2">
                    <select name="players_array[]" class = "pf_player_team3" id="pf_player_id">
                    </select>
                </div>
            </div>
            <br>
            <div class = "c_player_name">
                <h2>C</h2>
                <div class='c_teams'>
                    <p>チーム：</p>
                    <div>
                        <select id = "c_team_select">
                            <option value = "" class = 'option'>Cの選手の所属するチームを選択してください</option>
                        @foreach($teams as $team)
                            <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }} ({{$team->name}})</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class = "c_player2">
                    <select name="players_array[]" class = "c_player_team3" id="c_player_id">
                    </select>
                </div>
            </div>
            <br>
            <input type="hidden" name="ranking[user_id]" value="{{Auth::user()->id}}">
            <div class="reason">
                <h2>理由</h2>
                <textarea name="ranking[contents]"maxlength="500" placeholder="PG・・・今シーズンのMVP etc...">
                </textarea>
                <p id="count">あと<span id="num"></span>文字</p>
            </div>
            <div class="button">
                <input type="submit" value="投稿する" class="submit">
                <a href="/ranking" class="back"><i class="fa-solid fa-arrow-right-to-bracket"></i>  戻る</a>
            </div>
        </form>
    </body>
</html>
@endsection