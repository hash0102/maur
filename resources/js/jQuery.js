
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
      url: "/posts/teams/" + teamId,
      dataType: "json",
      })
      .done(function(res)  {
        $('.posts').empty();
        if(res.player_info.data.length !== 0){
          
        $.each(res.player_info.data, function (index, value) {
          let user = `
              <p>投稿者：${value.user.name} </p>
              <p>選手名： ${value.player.first_name} ${value.player.last_name}</p>
              <p>チーム：${value.team.state_name} ${value.team.name } </p>
              <p>ポジション: ${value.player.position } </p>
              <p> オフェンス評価：${value.offense_review } </p>
              <p> ディフェンス評価：${value.defense_review } </p>
              <p><img src = ${value.player.image } ></p>
              <div class = "reason">
              <p>評価理由：${value.content}</p>
              </div>
              <p>投稿日付：${value.created_at}</p>
              <button><a href="/posts/${value.id}">投稿詳細</a></button>
              <button><a href="/players/${ value.player_id }"><i class="fa-solid fa-angles-right"></i>    選手詳細</a></button>
              <p>いいね数：${value.likes_count} いいね</p>
              <hr>`;
          $(".posts").append(user);
        });
        }else{
         let notUser = `
         <p>現在投稿はございません。</p>
         `;
         $(".posts").append(notUser);
        }
    })
    .fail((error) => {
      alert(error.statusText);
    });
  }
});
