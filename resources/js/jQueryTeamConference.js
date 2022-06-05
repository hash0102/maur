
$("#conferences").on('change',function ()
{
  let teamConf  = $("#conferences").val();
  if(teamConf == "")
  {
    $('.team_contents').show();
    $('.team_contents2').hide();
    $('.paginate').show();
  } else {
    $('.team_contents').hide();
    $('.team_contents2').show();
    $('.paginate').hide();
    $.ajax({
      type: "get",       
      url: "/teams/conferences/" + teamConf,
      dataType: "json",
      })
      .done(function(res)
      {
        $('.team_contents2').empty();
          $.each(res.team_conf, function (index, value)
          {
            console.log(value);
              let teams = `
                <img src= "${value.image}" class="team-image">
                <div class="team-name">
                  <p>州：${value.state_name}</p>
                  <p>チーム名：${value.name}</p>
                  <p>省略名：${value.abname}</p>
                  <p>カンファレンス：${value.conference}</p>
                  <div class="peformance">
                    <p>2022シーズンの成績</p>
                    <p>勝利数：${value.teamstat.win}</p>
                    <p>敗北数：${value.teamstat.lose}</p>
                  </div>
                </div>
                <a href = "/teams/players/${value.id}" class="player-by-team">選手の情報を見る</a>
                <hr>`;
              $(".team_contents2").append(teams);
          });
      })
    .fail((error) => {
      alert(error.statusText);
    });
  }
});
