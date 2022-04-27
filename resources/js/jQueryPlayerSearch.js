 $('.search-icon').on('click', function () {
        let playerName = $('#search_name').val(); //検索ワードを取得
        $('.posts2').hide();
        $('.paginate').hide();
        if (!playerName) 
        {
          return false;
        }
        $.ajax({
            type: 'GET',
            url: '/players/search/' + playerName,
            dataType: 'json', //json形式で受け取る
        }).done(function (data) { //ajaxが成功したときの処理
            $('.posts').empty();
            if (data.players_search.length != 0) {
             $.each(data.players_search, function (index, value) { //dataの中身からvalueを取り出す
               let player = `
            <p> 選手名：${ value.first_name } ${value.last_name} </p>
            <p><img src = "${value.image}" width = 10%><p>
            <p>チーム：<img src = ${value.team.image} width = 1.25% height= 10%>  ${value.team.state_name} ${value.team.name } </p>
            <p>No.： ${value.jersey}</p>
            <p>身長：${value.height} cm</p>
            <p>体重：${value.weight} kg</p>
            <p>ポジション：${value.position}</p>
            <p>誕生日：${value.birthday}</p>
            <p>出身国：${value.birthcountry}</p>
            <p>出身：${value.birthcity}</p>
            <p>大学：${value.college} 大学</p>
            <p>高校：${value.highschool} 高校</p>
            <p>プロ歴：${value.experience} 年</p>
            <p>年俸：${value.salary} ドル</p>
              <hr>
              `;
              $('.posts').append(player);
        });
            }else{
                
                  let notPlayer = `
              <p>選手が見つかりませんでした。スペルなどをご確認ください。</p>
              `
                $('.posts').append(notPlayer);
            }
    }).fail(function () {
　　　//ajax通信がエラーのときの処理
            console.log('失敗');
        })
});