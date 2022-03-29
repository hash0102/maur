<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿登録</title>
    </head>
    <body>
        <h1>投稿登録</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class = "post">
                <h2>選手</h2>
                <select name = "post[player_id]">
                    @foreach($players as $player)
                    <option value = "{{ $player->id }}">{{ $player->first_name ." ". $player->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class = users>
                <p>ユーザー</p>
                <select name = "post[user_id]">
                @foreach($users as $user)
                <option value = "{{$user->id}}">{{ $user->name }}</option>
                @endforeach
                </select>
                
            </div>   
            <div class="reason">
                <p>オフェンス評価</p>
                <input type = "number" name = "post[offense_review]"　min = "0" max = "100"></input>
                <p>ディフェンス評価</p>
                <input type = "number" name = "post[defense_review]"　min = "0" max = "100"></input>
                <h2>評価理由</h2>
                <textarea name="post[content]" placeholder="評価理由"></textarea>
            </div>   
           
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
    </body>
</html>