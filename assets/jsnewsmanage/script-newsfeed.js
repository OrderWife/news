$.each(Objnews, function(i, news) {
    // console.log(news.N_IMG);
    if(news.N_IMG == 'null'){
      var img = 'No_image.png';
    }else{
      var img = news.N_IMG;
    }
    if (i < 9){
        var $li = $('<li>').append(
          $('<a href="news/newspage/'+news.NEWS_ID+'">').html('<img src="upload/if_256_colors_131813.png" alt="">' + news.N_TITLE)
          // $('<a href="href="news/newspage/'+news.NEWS_ID+'">').html('<i class="fa fa-bullhorn" style="font-size:20px;"/>' + news.N_TITLE)
        ).appendTo('#ticker01');
    }
    if (i < 4) {
      var $news = $('<div class="single_iteam">').append(
            $('<a href="news/newspage/'+news.NEWS_ID+'">').html('<img src="upload/'+img+'" alt="">'),
            $('<div class="slider_article">').html('<h2><a class="slider_tittle" href="news/newspage/'+news.NEWS_ID+'">'+news.N_TITLE+'</a></h2>'),
            // $('<td>').html(item.N_CATEGORY)
            ).appendTo('#newsSlider');
    }
    if (i < 4) {
      var $liNews = $('<li>').append(
        // $('<div class="media">').html('<a href="href="news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
        // +'<div class="media-body"><a href="news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
        $('<div class="media wow fadeInDown">').html('<a href="news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
        +'<div class="media-body"><a href="news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
        )).appendTo('#newslist');
    }

    $(function(){
      $('a > p.dot').dotdotdot({
          ellipsis: '...', /* The HTML to add as ellipsis. */
          wrap : 'children', /* How to cut off the text/html: 'word'/'letter'/'children' */
          watch : true, /* Whether to update the ellipsis: true/'window' */
          // tolerance: 3,  /* Deviation for the measured wrapper height. */
          // height: 5,
      });
  });
});
