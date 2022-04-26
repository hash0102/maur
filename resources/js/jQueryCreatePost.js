$("#team_select").on('change',function () {
  let teamSelectId  = $("#team_select").val();
  if(teamSelectId == "") {
    $('.player_name').show();
    $('.player_name2').hide();
  } else {
    $('.player_name').hide();
    $('.player_name2').show();
    $.ajax({
      type: "get",       
      url: "/posts/create/teams/" + teamSelectId,
      dataType: "json",
      })
      .done(function(res)  {
        //console.log(res);
        $('.player_team3').empty();
        $.each(res.player_select, function (index, value) {
         var player_by_team = `
         
         <option value="${value.id}">${value.first_name} ${value.last_name}</option>
         `;
         $(".player_team3").append(player_by_team);
          
          
        });
    })
    .fail((error) => {
     // alert(error.statusText);
    });
  }
});

$(function () {
  $("textarea").on('keydown keyup keypress change', function () {
    let count = $(this).val().length;
    let limit = 400 - count;
    if (limit <= 400) {
      $("#num").text(limit);
      $("input[type='submit']").prop('disabled', false).removeClass('disabled');
      if (limit <= 0) {
        $("#num").text('0');
        $("input[type='submit']").prop('disabled', true).addClass('disabled');
      }
    }
  });
});
