
$("#team").on('change',function () {
  let teamId  = $("#team").val();
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
      url: "teams/" + teamId,
      dataType: "json",
      })
      .done(function(res)  {
        $('.posts').empty();
        $.each(res.player_info.data, function (index, value) {
          console.log(value);
          var user = `
              <p>投稿者：${value.user.name} </p>
              <p>選手名： ${value.player.first_name} ${value.player.last_name}</p>
              <p>チーム：${value.team.state_name} ${value.team.name } </p>
              <p>ポジション: ${value.player.position.name } </p>
              <p> オフェンス評価：${value.offense_review } </p>
              <p> ディフェンス評価：${value.defense_review } </p>
              <p><img src = ${value.player.image } ></p>
              <p>投稿日付：${value.created_at}</p>
              <button><a href="/posts/${value.id}">投稿詳細</a></button>
              <hr>`;
          $(".posts").append(user);
          
          
        });
    })
    .fail((error) => {
      alert(error.statusText);
    });
  }
});


