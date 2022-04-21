@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQueryUser.js') }}" defer></script>
        <script src = "{{ mix('js/jQueryLike.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/maurIndex.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <body>
    <fotter>
        <div class = 'footer'>
            <div class = 'button'>
                <button><a href = '/'><i class="fa-solid fa-house"></i>    HOME</a></button>
                <button><a href = '/players'><i class="fa-solid fa-people-group"></i>    選手詳細</a></button>
                <button><a href = '/posts/create'><i class="fa-solid fa-circle-plus"></i>    投稿登録</a></button>
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
    </fotter>
        <h1>自分の投稿</h1>
        <hr>
        <div class='posts'>
        </div>
        
        <div class='posts2'>
            @if($posts->isEmpty())
            <p>現在投稿はございません。</p>
            @else
            @foreach ($posts as $post)
            <p>投稿者名：{{ $post->user->name}}</p>
            <p>選手名：{{ $post->player->first_name }} {{ $post->player->last_name}}</p>
            <p>チーム：<img src = "{{$post->player->team->image}}" width = 1.25% height= 10%>   {{$post->player->team->state_name }} {{$post->player->team->name }}</p>
            <p>ポシション： {{ $post->player->position }}</p>
            <p>オフェンス評価：{{ $post->offense_review }}</p>
            <p>ディフェンス評価：{{ $post->defense_review }}</p>
            <p>評価理由：{{$post->content}}</p>
            <p><img src = "{{$post->player->image }}"></p>
            @auth
              @if (!$post->isLikedBy(Auth::user()))
                    <span class="likes">
                        <i class="fa-solid fa-basketball like-toggle" data-post-id="{{ $post->id }}"></i>
                      <span class="like-counter">{{$post->likes_count}}</span>
                    </span>
               @else
                <span class="likes">
                    <i class="fa-solid fa-basketball like-toggle liked" data-post-id="{{ $post->id }}"></i>
                    <span class="like-counter">{{$post->likes_count}}</span>
                </span>
               @endif
               @endauth
               @guest
                <span class="likes">
                    <i class="fa-solid fa-basketball"></i>
                    <span class="like-counter">{{$post->likes_count}}</span>
                </span>
               @endguest
            <button><a href="/users/{{ $post->id }}">投稿詳細</a></button>
            <button><a href="/players/{{ $post->player_id }}"><i class="fa-solid fa-angles-right"></i>    選手詳細</a></button>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                @if($post->user_id === \Auth::user()->id)
                <input type ="submit" style = "display:none">
                <button class = 'delete'><span onclick = "return deletePost(this);"><i class="fa-solid fa-delete-left"></i>    削除</span></button>
                @endif
            </form>
            <hr>
            @endforeach
            @endif
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection