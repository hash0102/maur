$("#teams").on('change',function ()
{
  let teamId  = $("#teams").val();
  if(teamId == "") 
  {
    $('.posts2').show();
    $('.paginate').show();
    $('.posts').hide();
  } else {
    $('.posts2').hide();
    $('.paginate').hide();
    $('.posts').show();
    $.ajax({
      type: "get",       
      url: "players/teams/"+teamId,
      dataType: "json",
      })
      .done(function(res)
      {
        $('.posts').empty();
        $.each(res.players_info.data, function (index, value)
        {
          console.log(value);
          var players_content = `
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
          $('.posts').append(players_content);
        });
      })
      .fail((error) => {
        alert(error.statusText);
      });
  }
});


