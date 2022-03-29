
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "{{ mix('js/jQuery.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <fotter>
        <div class = 'footer'>
            <div class = 'button'>
                <button><a href='/users/index'></a>USER</button>
                <button class = 'login'>LOGIN</button> 
                <button><a href = '/players'>選手詳細</a></button>
                <button><a href = 'posts/create'>投稿登録</a></button>
            </div>
            <select id = "team">
                @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->abname }}</option>
                @endforeach
            </select>
            
            </div>
        </div>
    </fotter>
        <h1>最新の投稿</h1>
       

        <div class='posts'>
            @foreach ($posts as $post)
            @if($post->user_id == '1')
            <p>投稿者：{{$post->user->name }}</p>
            <p>選手名：{{ $post->player->first_name }} {{ $post->player->last_name}}</p>
            <p>チーム：{{$post->player->team->state_name }} {{$post->player->team->name }}</p>
            <p>ポシション： {{ $post->player->position->name }}</p>
            <p>オフェンス評価：{{ $post->offense_review }}</p>
            <p>ディフェンス評価：{{ $post->defense_review }}</p>
            <p>評価理由：{{$post->content}} </p>
            <div class = 'Button'>
                <button><a href = 'posts/{{$post->player->id }}'>詳細</a></button>
            </div>
            @if($post->player->id == 2)
            <img src = "{{$post->player->image}}" width="25%" height="25%">
            @else
            <img src = "{{$post->player->image}}" width="30%" height="50%">
            @endif
            <ul>今シーズンのスタッツ</ul>
            <li>PPG：{{ $post->player->PPG }}</li>
            <li>RPG：{{ $post->player->RPG }}</li>
            <li>APG：{{ $post->player->APG }}</li>
            <li>MPG：{{ $post->player->MPG }} 分</li>
            <li>FG：{{ $post->player->FG }}％</li>
            <li>3P：{{ $post->player->three_point }}％</li>
            <li>FT：{{ $post->player->FT }}%</li>
            <hr>
            @endif
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
