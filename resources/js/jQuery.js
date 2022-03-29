
//$(function(){
  //$('#team').change(function(){
    //$.ajax({
      //url:'/',
      //type:'GET',
     //}).done(function(json){
     //   alert(json['post']);
      //}).fail(function(json){
          //alert('ajax失敗');
     // });
   // });
//});

$("#team").on('change',function () {
  $.ajax({
    type: "get", //HTTP通信の種類
    url: "/",
    dataType: "json",
  })
    //通信が成功したとき
    .done((res) => { // resの部分にコントローラーから返ってきた値 $users が入る
      $.each(res, function (index, value) {
        html = `
                      <tr class="posts">
                          <td class="col-xs-2">ユーザー名：${value.contents}</td>
                      </tr>
         `;
      $(".posts").append(html); //できあがったテンプレートを user-tableクラスの中に追加
      });
    })
    //通信が失敗したとき
    .fail((error) => {
      console.log(error.statusText);
    });
});