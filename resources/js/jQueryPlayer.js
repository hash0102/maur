
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
          var players_content = `
              <p> 選手名：${ value.first_name } ${value.last_name} </p>
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
            <p><img src = "${value.image}" width = 10%><p>
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