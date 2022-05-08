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
        <h1><span><i class="fa-solid fa-circle-plus"></i></span>投稿登録</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="player_name">
                <div class='teams'>
                    <p>チーム：</p>
                    <div class="team_select">
                        <select id = "team_select" name="post[team_id]">
                            <option value = "" class = 'option'>選手の所属するチームを選択してください</option>
                        @foreach($teams as $team)
                            <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class = "player_name2">
                    <select name="post[player_id]" class = "player_team3" >
                    </select>
              　</div>
            </div>
            <input type="hidden" name="post[user_id]" value="{{Auth::user()->id}}">
            <div class="reviews">
                <p class="of-review">オフェンス評価</p>
                <div>
                    <input type="number" name="post[offense_review]" min="0" max="100" class="point"></input>
                </div>
                <p class="df-review">ディフェンス評価</p>
                <div>
                    <input type="number" name="post[defense_review]" min="0" max="100"class="point"></input>
                </div>
            </div>
            <div class="reason">
                <h2>評価理由</h2>
                <textarea name="post[content]" placeholder="評価理由" class="reason-content"></textarea>
            </div>
            <p id="count">あと<span id="num"></span>文字</p>
            <div class="button">
                <input type="submit" value="投稿する"class="submit">
                <a href="/" class="back"><i class="fa-solid fa-arrow-right-to-bracket"></i>  戻る</a>
            </div>
        </form>
    </body>
</html>
@endsection