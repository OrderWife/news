
<!DOCTYPE html>
<html>
<head>
<title>NewsFeed | Pages | Single Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?php echo base_url();?>" target="_blank">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/newsfeed-assets/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/customStyle.css">
<!-- Custom Fonts -->
<link href="assets/startmin-master/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="assets/newsfeed-assets/assets/js/html5shiv.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/respond.min.js"></script>
<![endif]-->
<style media="screen">
  h4{
    line-height: 1.3;
  }
</style>
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <h1><a href="index.php/news" target="_self"><font color="#FFF">NHSO.<small><font color="#FFF">bkk</font></small></font></a></h1>
          </div>
          <div class="header_top_right">
            <p><?php echo $dateThai; ?></p>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <!-- <nav class="navbar" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="assets/newsfeed-assets/index.html"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
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
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="404.html">404 Page</a></li>
        </ul>
      </div>
    </nav> -->
  </section>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <!-- <ol class="bnewspagecrumb">
              <li><a href="assets/newsfeed-assets/index.html">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Mobile</li>
            </ol> -->
            <h4 id="title"><!--Title--></h4>
            <div class="post_commentbox"> <span><i class="fa fa-user"></i><span id="admin"></span></span> <span><i class="fa fa-calendar"></i><span id="start_date"> </span> </span>  </div>
            <div class="single_page_content" id="contentNews">
              <!--News-->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top: 15px;">
              <div class="single_sidebar wow fadeInDown " id="hideDownload">
                <h2><span>เอกสารแนบ</span></h2>
                <ul id="download">
                  <!-- <li><a href="#">Blog</a></li> -->
                  <!-- Files is Here -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>กระดานข่าว</span></h2>
            <div class="latest_post_container">
              <!-- <div id="prev-button"><i class="fa fa-chevron-up"></i></div>  -->
              <ul class="spost_nav" id="newslist"> <!-- class = latest_postnav -->

              </ul>
              <ul>
                <li><a href="index.php/news/newslist"><p align="right"><font color="blue">ประกาศ/ข่าว ทั้งหมด</font></p></a></li>
              </ul>
              <!-- <div id="next-button"><i class="fa  fa-chevron-down"></i></div> -->
            </div>
          </div>
          <div id="taghide" class="single_sidebar">
              <h2><span>Tag</span></h2>
            <div class="tab-content">
              <div role="tabpanel">
                <ul id="tag">
                  <!-- <li class="cat-item"><a href="#">Sports</a></li> -->
                  <!-- Add tag Here -->
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
          <!-- <div class="single_sidebar wow fadeInDown " id="hideDownload">
            <h2><span>เอกสารแนบ</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div> -->
        </aside>
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
  var data = <?php echo $newsDetail; ?>;
  var files = <?php echo $filename; ?>;
  var Objnews = <?php echo $Objnews; ?>;
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
                 $('<span>').html('<p><a href="index.php/news/download/'+item.N_FILE+'/'+item.N_ORIGNAME+'" style="font-size:14px;"><i class="fa fa-download" style="font-size:20px;"></i> '+"  "+item.N_ORIGNAME+'</a><p>')
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
      // $('<div class="media">').html('<a href="href="index.php/news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
      // +'<div class="media-body"><a href="index.php/news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
      $('<div class="media wow fadeInDown">').html('<a href="index.php/news/newspage/'+news.NEWS_ID+'" class="media-left"> <img alt="" src="upload/'+img+'"> </a>'
      +'<div class="media-body"><a href="index.php/news/newspage/'+news.NEWS_ID+'" class="catg_title"><p class="dot">'+news.N_TITLE+'</p></a></div>'
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

</script>
</body>
</html>
