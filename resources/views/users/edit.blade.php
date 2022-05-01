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
    <body>
       <form action="/users/edit/{{$user->id}}"method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}" />
            <p>名前</p>
            <input type="text" name="name" value="{{ $user->name }}" />
            <p>メール</p>
            <input type="text" name="email" value="{{ $user->email }}" /><br/>
            <p>イメージ</p>
            <input type="file" name="image" value="{{$user->image}}">
            <div class ="favorite_team">
            <p>お気に入りチームを選択する</p>
            <select name="team_id">
                @foreach($teams as $team)
                <option value ="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
            </div>
            <div class ="submit">
            <input type="submit" value="更新" />
            </div>
          </form>
          <button><a href = "/users/profile/mypage">マイページに戻る</a></button>
    </body>
</html>
@endsection