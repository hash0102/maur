<!DOCTYPE html>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>選手登録</title>
    </head>
    <body>
        <h1>選手登録</h1>
        <form action="/players" method="POST">
            @csrf
            <div class="name">
                <h2>選手名</h2>
                <input type="text" name="player[first_name]" placeholder="名前"/>
                <input type="text" name="player[last_name]" placeholder="名字"/>
            </div>
            <div class="body">
                <h2>身体</h2>
                <input type = "text" name="player[height]" placeholder="cmで入力"></input>
                <input type = "text" name="player[weight]" placeholder="kgで入力"></input>
            </div>
            <div class = "stats">
                <h2>スタッツ</h2>
                <input type = "text" name="player[PPG]" placeholder="平均得点"></input>
                <input type = "text" name="player[RPG]" placeholder="平均リバウンド"></input>
                <input type = "text" name="player[APG]" placeholder="平均アシスト"></input>
                <input type = "text" name="player[MPG]" placeholder="平均プレイタイム"></input>
                <input type = "text" name="player[FG]" placeholder="平均フィールドゴール"></input>
                <input type = "text" name="player[three_point]" placeholder="平均３P"></input>
                <input type = "text" name="player[FT]" placeholder="平均フリースロー"></input>
            </div>
                 <div class = "age">
                     <input type = "text" name="player[age]" placeholder="年齢"></input>
                 </div>
                 
                 <div class = 'URL'>
                     <p>選手画像</p>
                     <input type = "text" name="player[image]" placeholder="URL"></input>
                </div>
                <div class = 'team_name'>
                                             <p>所属チーム</p>
                     <select name = "player[team_id]">
                        @foreach($teams as $team)
                        <option value = "{{$team->id}}">{{ $team->abname }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class = 'position_name'>
                    <p>ポジション</p>
                        <select name = "player[position_id]">
                            @foreach($positions as $position)
                            <option value = "{{$position->id}}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                </div>
                    
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/players">戻る</a>]</div>
    </body>
</html>