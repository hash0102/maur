@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/profileEdit.css') }}">
    <body>
        <h1><span><i class="fa-solid fa-address-card"></i></span>アカウント編集</h1>
        <hr>
        <form action="/users/edit/{{$user->id}}"method="post" enctype="multipart/form-data">
            <div class="edit-content">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}" />
                <div class= "edit-name">
                    <p>名前：</p>
                    <div>
                        <input type="text" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class= "edit-mail">
                    <p>メール：</p>
                    <div>
                        <input type="text" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class= "edit-image">
                    <p class="image-tag">画像：</p>
                    <div>
                        <input type="file" name="image" value="{{$user->image}}">
                    </div>
                </div>
                <div class ="favorite_team">
                    <p>お気に入りチーム：</p>
                    <div>
                        <select name="team_id" class="favorite-team-tag">
                            @foreach($teams as $team)
                                <option value ="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class ="button">
                <input type="submit" value="変更する" />
                <a href = "/users/profile/mypage"　class="back">マイページに戻る</a>
            </div>
        </form>
    </body>
</html>
@endsection