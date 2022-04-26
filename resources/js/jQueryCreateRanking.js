$("#pg_team_select").on('change',function () {
  let pgTeamSelectId  = $("#pg_team_select").val();
  if(pgTeamSelectId == "") {
    $('.pg_player2').hide();
  } else {
    $('.pg_player2').show();
    $.ajax({
      type: "get",       
      url: "/ranking/create/pg/teams/" + pgTeamSelectId,
      dataType: "json",
      })
      .done(function(res)  {
        //console.log(res);
        $('.pg_player_team3').empty();
        $.each(res.pg_player_select, function (index, value) {
         
         var pg_player_by_team = `
         <option value="${value.id}">${value.first_name} ${value.last_name}</option>
         `;
         $(".pg_player_team3").append(pg_player_by_team);
         
        });
    })
    .fail((error) => {
     // alert(error.statusText);
    });
  }
});

$("#sg_team_select").on('change',function () {
  let sgTeamSelectId  = $("#sg_team_select").val();
  if(sgTeamSelectId == "") {
    $('.sg_player2').hide();
  } else {
    $('.sg_player2').show();
    $.ajax({
      type: "get",       
      url: "/ranking/create/sg/teams/" + sgTeamSelectId,
      dataType: "json",
      })
      .done(function(res)  {
          $('.sg_player_team3').empty();
        $.each(res.sg_player_select, function (index, value) {
         var sg_player_by_team = `
         
         <option value="${value.id}">${value.first_name} ${value.last_name}</option>
         `;
         $(".sg_player_team3").append(sg_player_by_team);
          
          
        });
    })
    .fail((error) => {
     // alert(error.statusText);
    });
  }
});

$("#sf_team_select").on('change',function () {
  let sfTeamSelectId  = $("#sf_team_select").val();
  if(sfTeamSelectId == "") {
    $('.sf_player2').hide();
  } else {
    $('.sf_player2').show();
    $.ajax({
      type: "get",       
      url: "/ranking/create/sf/teams/" + sfTeamSelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $('.sf_player_team3').empty();
        $.each(res.sf_player_select, function (index, value) {
         var sf_player_by_team = `
         
         <option value="${value.id}">${value.first_name} ${value.last_name}</option>
         `;
         $(".sf_player_team3").append(sf_player_by_team);
          
          
        });
    })
    .fail((error) => {
     // alert(error.statusText);
    });
  }
});

$("#pf_team_select").on('change',function () {
  let pfTeamSelectId  = $("#pf_team_select").val();
  if(pfTeamSelectId == "") {
    $('.pf_player2').hide();
  } else {
    $('.pf_player2').show();
    $.ajax({
      type: "get",       
      url: "/ranking/create/pf/teams/" +pfTeamSelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $('.pf_player_team3').empty();
        $.each(res.pf_player_select, function (index, value) {
         var pf_player_by_team = `
         
         <option value="${value.id}">${value.first_name} ${value.last_name}</option>
         `;
         $(".pf_player_team3").append(pf_player_by_team);
          
          
        });
    })
    .fail((error) => {
     // alert(error.statusText);
    });
  }
});

$("#c_team_select").on('change',function () {
  let pfTeamSelectId  = $("#c_team_select").val();
  if(pfTeamSelectId == "") {
    $('.c_player2').hide();
  } else {
    $('.c_player2').show();
    $.ajax({
      type: "get",       
      url: "/ranking/create/c/teams/" +pfTeamSelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $('.c_player_team3').empty();
        $.each(res.c_player_select, function (index, value) {
         var c_player_by_team = `
         
         <option value="${value.id}">${value.first_name} ${value.last_name}</option>
         `;
         $(".c_player_team3").append(c_player_by_team);
          
          
        });
    })
    .fail((error) => {
     // alert(error.statusText);
    });
  }
});