let num = 0;
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
         var  select_tag = `
         <option value = "">選手を選択してください</option>
         `;
         $(".pg_player_team3").html(select_tag);
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
$("#pg_player_id").on('change',function () {
   let SelectId  = $("#pg_player_id").val();
    $.ajax({
      type: "get",       
      url: "/ranking/create/pg/players/" + SelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $.each(res.pg_player_select_by_id, function (index, value) {
         console.log(value);
         var pg_player_by_id = `
         
         <input type="hidden" name="positions_array[]" value="${value.position}">
         `;
         $(".pg_player_team3").append(pg_player_by_id);
          
          
        });
      
    })
    .fail((error) => {
     // alert(error.statusText);
    });
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
         var  select_tag = `
         <option value = "">選手を選択してください</option>
         `;
         $(".sg_player_team3").html(select_tag);
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

$("#sg_player_id").on('change',function () {
   let SelectId  = $("#sg_player_id").val();
    $.ajax({
      type: "get",       
      url: "/ranking/create/sg/players/" + SelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $.each(res.sg_player_select_by_id, function (index, value) {
         console.log(value);
         var sg_player_by_id = `
         
         <input type="hidden" name="positions_array[]" value="${value.position}">
         `;
         $(".sg_player_team3").append(sg_player_by_id);
          
          
        });
      
    })
    .fail((error) => {
     // alert(error.statusText);
    });
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
         var  select_tag = `
         <option value = "">選手を選択してください</option>
         `;
         $(".sf_player_team3").html(select_tag);
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

$("#sf_player_id").on('change',function () {
   let SelectId  = $("#sf_player_id").val();
    $.ajax({
      type: "get",       
      url: "/ranking/create/sf/players/" + SelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $.each(res.sf_player_select_by_id, function (index, value) {
         console.log(value);
         var sf_player_by_id = `
         
         <input type="hidden" name="positions_array[]" value="${value.position}">
         `;
         $(".sf_player_team3").append(sf_player_by_id);
          
          
        });
      
    })
    .fail((error) => {
     // alert(error.statusText);
    });
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
         var  select_tag = `
         <option value = "">選手を選択してください</option>
         `;
         $(".pf_player_team3").html(select_tag);
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

$("#pf_player_id").on('change',function () {
   let SelectId  = $("#pf_player_id").val();
    $.ajax({
      type: "get",       
      url: "/ranking/create/pf/players/" + SelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $.each(res.pf_player_select_by_id, function (index, value) {
         console.log(value);
         var pf_player_by_id = `
         
         <input type="hidden" name="positions_array[]" value="${value.position}">
         `;
         $(".pf_player_team3").append(pf_player_by_id);
          
          
        });
      
    })
    .fail((error) => {
     // alert(error.statusText);
    });
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
         var  select_tag = `
         <option value = "">選手を選択してください</option>
         `;
         $(".c_player_team3").html(select_tag);
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

$("#c_player_id").on('change',function () {
   let SelectId  = $("#c_player_id").val();
    $.ajax({
      type: "get",       
      url: "/ranking/create/c/players/" + SelectId,
      dataType: "json",
      })
      .done(function(res)  {
        $.each(res.c_player_select_by_id, function (index, value) {
         console.log(value);
         var c_player_by_id = `
         
         <input type="hidden" name="positions_array[]" value="${value.position}">
         `;
         $(".c_player_team3").append(c_player_by_id);
          
          
        });
      
    })
    .fail((error) => {
     // alert(error.statusText);
    });
});