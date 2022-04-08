
$("#teams").on('change',function () {
  let teamId  = $("#teams").val();
  if(teamId == "") {
    $('.posts2').show();
    $('.paginate').show();
    $('.posts').hide();
  } else {
    $('.posts2').hide();
    $('.paginate').hide();
    $('.posts').show();
    $.ajax({
      type: "get",       
      url: "players/teams/" + teamId,
      dataType: "json",
      })
      .done(function(res)  {
        $('.posts').empty();
        $.each(res.players_info.data, function (index, value) {
          console.log(index);
          var players_content = `
              <p> 選手名：${ value.first_name } ${value.last_name} </p>
              <p>チーム：${value.team.state_name} ${value.team.name } </p>
              <p>ポジション: ${value.position.name } </p>
              <p>年齢：${value.age } 歳</p>
              <p><img src = ${value.image } ></p>
              <ul>今シーズンのスタッツ</ul>
              <li>PPG：${value.PPG }</li>
              <li>RPG：${value.RPG}</li>
              <li>APG：${value.APG}</li>
              <li>MPG：${value.MPG} 分</li>
              <li>FG：${value.FG}％</li>
              <li>3P：${value.three_point}％</li>
              <li>FT：${value.FT}%</li>
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