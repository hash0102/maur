
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
          if(value.user.team_id==null)
          {
            let notTeamUser = `
              <p class="name">選手名： ${value.player.first_name} ${value.player.last_name}</p>
              <p class = 'player-image'><img src = ${value.player.image } ></p>
              <div class = "contents">
              <p>チーム：<img src ="${value.team.image}" width = 1.5% height= 10%> ${value.team.state_name} ${value.team.name } </p>
              <p>ポジション: ${value.player.position } </p>
              <div class="reviews">
              <p class="of-review"> オフェンス評価：${value.offense_review } </p>
              <p class="df-review"> ディフェンス評価：${value.defense_review } </p>
              </div>
              </div>
              <div class = "reason">
              <p>評価理由：${value.content}</p>
              </div>
              <p>投稿者：<img src = "${value.user.image}" width=1.5% class="user-image">${value.user.name} </p>
              <p>投稿者のお気に入りのチーム：未設定</p>
              <p>いいね数：${value.likes_count} いいね</p>
              <p>投稿日付：${value.created_at}</p>
              <a href="/posts/${value.id}"class="posts_info"><i class="fa-solid fa-angles-right"></i>    投稿詳細</a>
              <a href="/players/${ value.player_id }" class="players_info"><i class="fa-solid fa-user"></i>    選手詳細</a>
              <hr>`;
          $(".posts").append(notTeamUser);
          }else{
            console.log(value);
          let user = `
              <p class="name">選手名： ${value.player.first_name} ${value.player.last_name}</p>
              <p class = 'player-image'><img src = ${value.player.image } ></p>
              <div class = "contents">
              <p>チーム：<img src="${value.team.image}" width = 1.5% height= 10%> ${value.team.state_name} ${value.team.name } </p>
              <p>ポジション: ${value.player.position } </p>
              <div class="reviews">
              <p class="of-review"> オフェンス評価：${value.offense_review } </p>
              <p class="df-review"> ディフェンス評価：${value.defense_review } </p>
              </div>
              </div>
              <div class = "reason">
              <p>評価理由：${value.content}</p>
              </div>
              <p>投稿者：<img src = "${value.user.image}" width=1.5% class="user-image">${value.user.name} </p>
              <p>投稿者のお気に入りのチーム：<img src="${value.user.team.image}" width = 1.25% height= 10%> ${value.user.team.state_name } ${value.user.team.name}</p>
              <p>いいね数：${value.likes_count} いいね</p>
              <p>投稿日付：${value.created_at}</p>
              <a href="/posts/${value.id}"class="posts_info"><i class="fa-solid fa-angles-right"></i>    投稿詳細</a>
              <a href="/players/${ value.player_id }" class="players_info"><i class="fa-solid fa-user"></i>    選手詳細</a>
              <hr>`;
              console.log(user);
          $(".posts").append(user);
          }
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
