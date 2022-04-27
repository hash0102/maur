@extends('layouts.app')
@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <script src = "{{ mix('js/jQueryCreateComment.js') }}" defer></script>
        <title>コメント登録</title>
    </head>
    <body>
        <h1>コメント登録</h1>
        <form action="/comments" method="POST">
            @csrf
            <div class = "comment">
            <textarea name = "comment[contents]" placeholder = "暴言厳禁"></textarea>
            <input type = "hidden" name = "comment[user_id]" value = "{{Auth::user()->id}}">
            <input type = "hidden" name = "comment[post_id]" value = "{{$post->id}}">
            </div>   
           <p id="count">あと<span id="num"></span>文字</p>
            <input type="submit" value="保存"/>
        </form>
        <button><a href="/"><i class="fa-solid fa-arrow-right-to-bracket"></i>  最新の投稿に戻る</a></button>
    </body>
</html>
@endsection