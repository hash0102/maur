$(function () {
  let like = $('.like-toggle');
  let likeRankingId;
  like.on('click', function () {
    let $this = $(this);
    likeRankingId = $this.data('ranking-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/ranking/like',
      type: 'POST',
      data: {
        'ranking_id': likeRankingId
      },
    })
    .done(function (data) {
      $this.toggleClass('liked');
      $this.next('.like-counter').html(data.ranking_likes_count);
    })
    .fail(function () {
      alert('fail'); 
    });
  });
});