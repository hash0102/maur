
$("#team").on('change',function () {
  let teamId  = $("#team").val();
  if(teamId == "") {
    $('.posts2').show();
    $('.paginate').show();
    $('.posts').hide();
  } else {
    $('.posts2').hide();
    $('.paginate').hide();
    $.ajax({
      type: "get",       
      url: "teams/" + teamId,
      dataType: "json",
      })
      .done(function(res)  {
        $.each(res, function (index, value) {
          $('.posts').empty()
          for(let i = 0; i< value.length; i ++) {
          var user = `
          <p>投稿者：${res.player_info[i].user.name} </p>
          <p>選手名： ${res.player_info[i].player.first_name} ${res.player_info[i].player.last_name}</p>
          <p>チーム：${res.player_info[i].team.state_name} ${res.player_info[i].team.name } </p>
          <p>ポジション: ${res.player_info[i].player.position.name } </p>
          <p> オフェンス評価：${res.player_info[i].offense_review } </p>
          <p> ディフェンス評価：${res.player_info[i].defense_review } </p>
          <p> 評価理由：${res.player_info[i].content } </p>
          <p><img src = ${res.player_info[i].player.image } ></p>
          <hr>
          `;
        $(".posts").append(user);
        }
      });
    })
    .fail((error) => {
      alert(error.statusText);
    });
  }
});