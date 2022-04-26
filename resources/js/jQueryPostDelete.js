$(function() {
  
  $('.delete').click(function(){
    if(confirm('削除すると復元できません。\n 本当に削除しますか？'))
    {
      document.getElementById('form_delete').submit();
    } else {
      return false;
    }
  });
});
