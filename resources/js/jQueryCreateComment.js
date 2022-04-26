$(function () {
  $("textarea").on('keydown keyup keypress change', function () {
    let count = $(this).val().length;
    let limit = 200 - count;
    if (limit <= 200) {
      $("#num").text(limit);
      $("input[type='submit']").prop('disabled', false).removeClass('disabled');
      if (limit <= 0) {
        $("#num").text('0');
        $("input[type='submit']").prop('disabled', true).addClass('disabled');
      }
    }
  });
});
