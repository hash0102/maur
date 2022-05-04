@extends('layouts.app')
@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <script src = "{{ mix('js/jQueryCreateComment.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/commentCreate.css') }}">
        <title>コメント登録</title>
    </head>
    <body>
        <h1><span><i class="fa-solid fa-comment"></i></span>コメント登録</h1>
        <form action="/posts/comments/{{$post->id}}" method="POST">
            @csrf
            <div class = "comment">
                <textarea name = "comment[contents]" placeholder = "暴言厳禁"></textarea>
                <input type = "hidden" name = "comment[user_id]" value = "{{Auth::user()->id}}">
                <input type = "hidden" name = "comment[post_id]" value = "{{$post->id}}">
            </div>   
            <p id="count">あと<span id="num"></span>文字</p>
            <div class="button">
                <input type="submit" value="保存" class="submit">
                <a href="/posts/{{$post->id}}/comments" class="back"><i class="fa-solid fa-arrow-right-to-bracket"></i>  戻る</a>
            </div>
        </form>
    </body>
</html>
@endsection