 $('.search-icon').on('click', function ()
 {
    let playerName = $('#search_name').val();
    $('.posts2').hide();
    $('.paginate').hide();
    if (!playerName)
    {
      return false;
    }
    $.ajax({
        type: 'GET',
        url: '/players/search/' + playerName,
        dataType: 'json',
    }).done(function (data)
        {
            $('.posts').empty();
            if (data.players_search.length != 0)
            {
                $.each(data.players_search, function (index, value)
                {
                    let player = `
                        <div class="player-image-content">
                            <p class="player-name"> 選手名：${ value.first_name } ${value.last_name} </p>
                        <img class="player-image" src = "${value.image}">
                        </div>
                        <div class="player-contents">
                            <p>チーム：<span class="team_image"><img  class="team-image" src = "${value.team.image}"></span>  ${value.team.state_name} ${value.team.name } </p>
                            <p>背番号： ${value.jersey}</p>
                            <p>身長：${Math.round(value.height*10)/10} cm <span class='weight'>体重：${Math.round(value.weight*10)/10} kg</span></p>
                            <p>ポジション：${value.position}</p>
                            <p>誕生日：${value.birthday}</p>
                            <p>出身国：${value.birthcountry}<span class="city">出身：${value.birthcity}</span></p>
                            <p>大学：${value.college} Univ.</p>
                            <p>高校：${value.highschool} H.S.</p>
                            <p>プロ歴：${value.experience} 年</p>
                            <p>年俸：${value.salary} ドル</p>
                        </div>
                        <hr>
                        `;
                    $('.posts').append(player);
                });
            }else{
                
                let notPlayer = `
                    <p>選手が見つかりませんでした。スペルなどをご確認ください。</p>
                    `;
                $('.posts').append(notPlayer);
            }
    }).fail(function ()
    {
        console.log('失敗');
    });
});