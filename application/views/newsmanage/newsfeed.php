<!DOCTYPE html>
<html>
<head>
<title>NewsFeed</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?php echo base_url();?>">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/style.css">
<!-- Custom Fonts -->
<link href="assets/startmin-master/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/css/customStyle.css">

<!--[if lt IE 9]>
<script src="assets/newsfeed-assets/assets/js/html5shiv.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/respond.min.js"></script>
<![endif]-->
<!-- <style media="screen">
  a > p.dot{
    font-size:1em;
    line-height:1em;
    /* height:1em; */
    /* border:3px solid #00ACEE; */
    height: 5em;
    /* white-space: wrap; */
    text-overflow: ellipsis;
  }
  body {
    position: absolute;
    top: 0; bottom: 0; left: 0; right: 0;
    height: 100%;
}
body:before {
      content: "";
      position: absolute;
      background-color: rgba(51, 139, 255,0.5);
      /* background: url("assets/img/nhso-bg.jpg"); */
      background-size: cover;
      z-index: -1; /* Keep the background behind the content */
      height: 20%; width: 20%; /* Using Glen Maddern's trick /via @mente */

      /* don't forget to use the prefixes you need */
      transform: scale(9);
      transform-origin: top left;
      filter: blur(5px);
}

</style> -->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<div class="container">
  <!-- <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="pages/contact.html">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p>Friday, December 05, 2045</p>
          </div>
        </div>
      </div>
    </div>
  </header> -->
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.html" style="background-color:#1866b5;"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li><a href="#">Technology</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Android</a></li>
              <li><a href="#">Samsung</a></li>
              <li><a href="#">Nokia</a></li>
              <li><a href="#">Walton Mobile</a></li>
              <li><a href="#">Sympony</a></li>
            </ul>
          </li>
          <li><a href="#">Laptops</a></li>
          <li><a href="#">Tablets</a></li>
          <li><a href="pages/contact.html">Contact Us</a></li>
          <li><a href="pages/404.html">404 Page</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span style="background-color:#1866b5">ข่าวล่าสุด</span>
          <ul id="ticker01" class="news_sticker">

          </ul>
        </div>
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider" id="newsSlider">

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_sidebar">
          <h2><span style="background-color:#1866b5">กระดานข่าว</span></h2>
          <div class="latest_post_container">
            <!-- <div id="prev-button"><i class="fa fa-chevron-up"></i></div>  -->
            <ul class="spost_nav" id="newslist"> <!-- class = latest_postnav -->

            </ul>
            <ul>
              <li><a href="#"><p align="right"><font color="blue">ประกาศ/ข่าว ทั้งหมด</font></p></a></li>
            </ul>
            <!-- <div id="next-button"><i class="fa  fa-chevron-down"></i></div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer id="footer">
    <div class="footer_bottom">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- <div class="wow fadeInRightBig"> -->
          <h4>ติดต่อเรา</h4>
          <p>สำนักงานหลักประกันสุขภาพแห่งชาติ สาขาเขตพื้นที่(กรุงเทพมหานคร)</p>
          <address>
            120 ม. 3 อาคารรัฐประศาสนภักดี (อาคารบี) โซนทิศใต้ ชั้น 5 (ฝั่งลานจอดรถ) ศูนย์ราชการเฉลิมพระเกียรติ 80 พรรษา 5 ธันวาคม 2550
            ถนนแจ้งวัฒนะ แขวงทุ่งสองห้อง เขตหลักสี่ กรุงเทพมหานคร ฯ 10210
        </address>
      <!-- </div> -->
    </div>
    </div>
  </footer>
</div>
<script src="assets/newsfeed-assets/assets/js/jquery.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/wow.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/bootstrap.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/slick.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/newsfeed-assets/assets/js/jquery.newsTicker.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/newsfeed-assets/assets/js/custom.js"></script>
<script src="assets/jsdotdotdot/jquery.dotdotdot.js"></script>

<script type="text/javascript">
var Objnews = <?php echo json_encode($query); ?>;
$.each(Objnews, function(i, news) {
  console.log(news.N_IMG);
  if(news.N_IMG == 'null'){
    var img = 'No_image.png';
  }else{
    var img = news.N_IMG;
  }
  if (i < 9){
      var $li = $('<li>').append(
        $('<a href="href="index.php/news/newspage/'+news.NEWS_ID+'">').html('<img src="upload/if_256_colors_131813.png" alt="">' + news.N_TITLE)
        // $('<a href="href="index.php/news/newspage/'+news.NEWS_ID+'">').html('<i class="fa fa-bullhorn" style="font-size:20px;"/>' + news.N_TITLE)
      ).appendTo('#ticker01');
  }
  if (i < 4) {
    var $news = $('<div class="single_iteam">').append(
          $('<a href="index.php/news/newspage/'+news.NEWS_ID+'">').html('<img src="upload/'+img+'" alt="">'),
          $('<div class="slider_article">').html('<h2><a class="slider_tittle" href="pages/single_page.html">'+news.N_TITLE+'</a></h2>'),
          // $('<td>').html(item.N_CATEGORY)
          ).appendTo('#newsSlider');
  }
  if (i < 4) {
    var $liNews = $('<li>').append(
      // $('<div class="media">').html('<a href="href="index.php/news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
      // +'<div class="media-body"><a href="index.php/news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
      $('<div class="media wow fadeInDown">').html('<a href="href="index.php/news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
      +'<div class="media-body"><a href="index.php/news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
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
</script>

</body>
</html>
