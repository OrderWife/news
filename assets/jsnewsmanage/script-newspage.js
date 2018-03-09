$.each(data, function(index, el) {
            $('<span>').text(el.N_TITLE).appendTo('#title');
            $('<div>').html(el.N_CONTENT).appendTo('#contentNews');
            $('#admin').append(el.USERNAME);
            $('#start_date').append(el.N_START_DATE);
            var tag = el.N_TAG;
            if (tag != null) {
              tag = tag.split(',');
              $.each(tag, function(index, tagsplit) {
                $('#tag').append(
                  $('<li class="cat-item">').html('<a href="#">'+tagsplit+'</a>'),
                );
              });
            }else{
              $('#taghide').addClass('hide');
            }

});
if (files.length == 0) {
$('#hideDownload').addClass('hide');
}else{
$.each(files, function(index, item) {
            $('<li>').append(
               $('<span>').html('<p><a href="news/download/'+item.N_FILE+'/'+item.N_ORIGNAME+'" style="font-size:14px;"><i class="fa fa-download" style="font-size:20px;"></i> '+"  "+item.N_ORIGNAME+'</a><p>')
            ).appendTo('#download');
            // <li><a href="#">Blog</a></li>
});
}

$.each(Objnews, function(i, news) {
// console.log(news.N_IMG);
if(news.N_IMG == 'null'){
  var img = 'No_image.png';
}else{
  var img = news.N_IMG;
}
if (i < 4) {
  // console.log(news);
  var $liNews = $('<li>').append(
    // $('<div class="media">').html('<a href="href="news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
    // +'<div class="media-body"><a href="news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
    $('<div class="media wow fadeInDown">').html('<a href="news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
    +'<div class="media-body"><a href="news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
    )).appendTo('#newslist');
}
});

$(function(){
$('a > p.dot').dotdotdot({
    ellipsis: '...', /* The HTML to add as ellipsis. */
    wrap : 'children', /* How to cut off the text/html: 'word'/'letter'/'children' */
    watch : true, /* Whether to update the ellipsis: true/'window' */
    // tolerance: 3,  /* Deviation for the measured wrapper height. */
    // height: 5,
});
});
