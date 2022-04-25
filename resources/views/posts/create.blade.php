@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <script src = "{{ mix('js/jQueryCreatePost.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/postCreate.css') }}">
        <title>投稿登録</title>
    </head>
    <body>
        <h1>投稿登録</h1>
        <form action="/posts" method="POST">
            @csrf
              <div class='teams'>
                <p>チーム</p>
                <select id = "team_select" name="post[team_id]">
                    <option value = "" class = 'option'>選手の所属するチームを選択してください</option>
                @foreach($teams as $team)
                    <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }}</option>
                @endforeach
                </select>
                </div>
                
                <div class = "player_name">
                <h2>選手</h2>
                <select name="post[player_id]">
                    @foreach($players as $player)
                    <option value="{{ $player->id }}">{{ $player->first_name ." ". $player->last_name}}</option>
                    @endforeach
                </select>
                </div>
                
                <div class = "player_name2">
                <h2>選手</h2>
                  <select name="post[player_id]" class = "player_team3" >
                  </select>
                  </div>
            
            <input type="hidden" name="post[user_id]" value="{{Auth::user()->id}}">
               
            <div class="reason">
                <p>オフェンス評価</p>
                <input type="number" name="post[offense_review]" min="0" max="100"></input>
                <p>ディフェンス評価</p>
                <input type="number" name="post[defense_review]" min="0" max="100"></input>
                <h2>評価理由</h2>
                <textarea name="post[content]" placeholder="評価理由"></textarea>
            </div>
           
            <input type="submit" value="投稿する"/>
        </form>
        <button><a href="/"><i class="fa-solid fa-arrow-right-to-bracket"></i>  戻る</a></button>
    </body>
</html>
@endsection