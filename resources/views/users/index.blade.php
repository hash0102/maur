<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>NBA MAUR</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <body>
    <fotter>
        <div class = 'footer'>
            <div class = 'button'>
                <button><a href = '/posts/index'></a>HOME</button>
                <button>USER</button>
                <button>LOGIN</button>
            </div>
            <select name="teams" id="team">
                <option value="">--チームを選択する--</option>
                <option value="MIL">MIL</option>
                <option value="PHI">PHI</option>
                <option value="CHI">CHI</option>
                <option value="CLE">CLE</option>
            </select>
        
            <form action="posts/index" method="get">
            <input type="search" name="search" placeholder="検索キーワードを入力してください">
            <input type="submit" name="submit" value="検索">
            </form>
        </div>
    </fotter>
        <h1>最新の投稿</h1>
        <div class='posts'>
            @foreach ($posts as $post)
            @if(!$post->user_id == '1')
            <p>選手名：{{ $post->player->first_name }} {{ $post->player->last_name}}</p>
            <p>チーム：{{$post->player->team->state_name }} {{$post->player->team->name }}</p>
            <p>ポシション： {{ $post->player->position->name }}</p>
            <p>オフェンス評価：{{ $post->offense_review }}</p>
            <p>ディフェンス評価：{{ $post->defense_review }}</p>
            <p>評価理由：{{$post->content}} </p>
            <h2>今シーズンのスタッツ</h2>
            <p>PPG：{{ $post->player->PPG }}</p>
            <p>RPG：{{ $post->player->RPG }}</p>
            <p>APG：{{ $post->player->APG }}</p>
            <p>MPG：{{ $post->player->MPG }} 分</p>
            <p>FG：{{ $post->player->FG }}％</p>
            <p>3P：{{ $post->player->three_point }}％</p>
            <p>FT：{{ $post->player->FT }}%</p>
            @endif
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>