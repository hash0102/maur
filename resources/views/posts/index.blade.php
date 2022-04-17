@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQuery.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/maurIndex.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <fotter>
        <div class='footer'>
            <div class='button'>
                <button><a href='/users'>自分の投稿</a></button>
                <button><a href='/players'>選手詳細</a></button>
                <button><a href='posts/create'>投稿登録</a></button>
            </div>
            <div class ="team_Name"></div>
            <p>チーム名</p>
            <select id = "team">
                <option value = "" class = 'option'>チームを選択してください</option>
                @foreach($teams as $team)
                    <option  class = 'team_name' value="{{ $team->id }}">{{ $team->abname }}</option>
                @endforeach
            </select>
            </div>
        </div>
        </div>
    </fotter>
        <h1>最新の投稿</h1>
        <hr>
        <div class='posts'>
        </div>
        
        <div class='paginate2'>
        </div>
            
        <div class = 'posts2'>
        @foreach ($posts as $post)
            <p>投稿者：{{$post->user->name }}</p>
            <p>選手名：{{ $post->player->first_name }} {{ $post->player->last_name}}</p>
            <p>チーム：{{$post->player->team->state_name }} {{$post->player->team->name }}</p>
            <p>ポシション： {{ $post->player->position->name }}</p>
            <p>オフェンス評価：{{ $post->offense_review }}</p>
            <p>ディフェンス評価：{{ $post->defense_review }}</p>
            <p class = 'image'><img src = '{{ $post->player->image }}'></p>
            <p>投稿日付：{{$post->created_at}}</p>
            <div class="favorite_counts">いいね！
<span class="" aria-hidden="true">{{$post->favorite_users()->count()}}</span>
            </div>

            <button><a href="/posts/{{ $post->id }}">投稿詳細</a></button>
            <hr>
        @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    
    </body>
</html>
@endsection