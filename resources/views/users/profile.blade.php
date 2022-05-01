@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <body>
        <h1>Myページ</h1>
    <div class='button'>
        <a href="/users/edit/{{$user->id}}"class="edit-profile"><i class="fa-solid fa-address-card"></i></a>
        <a href = '/' class="home"><i class="fa-solid fa-house"></i></a>
        <a href = '/players' class="players"><i class="fa-solid fa-people-group"></i></a>
        <a href = '/ranking' class="ranking"><i class="fa-solid fa-ranking-star"></i></a>
    </div>
            <div class = 'my_info'>
                <p>マイネーム：{{$user->name}}</p>
                <img src = "{{$user->image}}">
                <p>メールアドレス：{{$user->email}}</p>
                <p>アカウント作成日：{{$user->created_at}}</p>
                <p>アカウント最終更新日：{{$user->updated_at}}</p>
                @if($user->team_id == NULL)
                <p>お気に入りのチーム：未設定</p>
                @else
                <p>お気に入りのチーム：<img src="{{$user->team->image}}" width = 1.25% height= 10%> {{$user->team->state_name }} {{$user->team->name}}</p>
                @endif
            </div>
    </body>
</html>
@endsection