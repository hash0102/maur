$(function () {
  let like = $('.like-toggle');
  let likeCommentId;
  like.on('click', function () {
    let $this = $(this);
    likeCommentId = $this.data('comment-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/comments/like',
      type: 'POST',
      data: {
        'comment_id': likeCommentId
      },
    })
    .done(function (data) {
      $this.toggleClass('liked');
      $this.next('.like-counter').html(data.comment_likes_count);
    })
    .fail(function () {
      alert('fail'); 
    });
  });
});