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
<!-- DataTables CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/startmin-master/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>assets/startmin-master/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/dataTables.bootstrap.min.js"></script>
<!-- <script src="assets/newsfeed-assets/assets/js/jquery.min.js"></script> -->
<script src="assets/newsfeed-assets/assets/js/wow.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/bootstrap.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/slick.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/jquery.li-scroller.1.0.js"></script>
<script src="assets/newsfeed-assets/assets/js/jquery.newsTicker.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/newsfeed-assets/assets/js/custom.js"></script>

<style href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.dataTables.min.css" media="screen"></style>

<style href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" media="screen"></style>



<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js" type="text/javascript"></script>


<!--[if lt IE 9]>
<script src="assets/newsfeed-assets/assets/js/html5shiv.min.js"></script>
<script src="assets/newsfeed-assets/assets/js/respond.min.js"></script>
<![endif]-->
<style media="screen">
  .navbar-inverse .navbar-nav > li > a{
    color : #FFFFFF;
  }

.dropdown-menu .sub-menu {
  visibility: hidden;
  left: 100%;
  top: auto;
  position: absolute;
  margin-top: -40px;
}

.dropdown-menu > li:hover > .sub-menu {
  visibility: visible;
}

.dropdown:hover .dropdown-menu {
  display: block;
}
</style>
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
          <li class="active"><a href="news" style="background-color:#1866b5;"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ข้อมูลองค์กร <i class="fa fa-angle-down fa-md"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="https://bkk.nhso.go.th/main/history.php"><span>ประวัติความเป็นมา</span></a></li>
              <li><a href="https://bkk.nhso.go.th/main/board.php"><span>คณะกรรมการ</span></a></li>
              <li><a href="https://bkk.nhso.go.th/main/org_chart.php"><span>โครงสร้างองค์กร</span></a> </li>
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">สำหรับประชาชน <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="http://bkk.nhso.go.th/regisform.pdf" target="_blank"><span>แบบคำร้องขอลงทะเบียน&nbsp;ผู้มีสิทธิหลักประกันสุขภาพถ้วนหน้า </span></a></li>
              <li><a href="http://bkk.nhso.go.th/mapcenter_new/"target="_blank"><span>แผนที่และข้อมูลหน่วยบริการ</span></a></li>
              <li><a href="http://bkk.nhso.go.th/mapservice/service-status.php"target="_blank"><span> 	แผนที่จุดรับลงทะเบียนสปสช. สาขา กทม.(ประจำสำนักงานเขต)</span></a></li>
              <li><a href="http://bkk.nhso.go.th/pp/stat/mcupmap.php"target="_blank"><span> 	บัญชีเครือข่าย</span></a></li>
              <li><a href="http://bkk.nhso.go.th/map0/map.php"target="_blank"><span>ศูนย์บริการสาธารณสุข</span></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">สำหรับหน่วยบริการ <b class="fa fa-angle-down"></b></a>
            <ul class="dropdown-menu" id="menu1">
              <li><a href="#">ระบบงาน OP  <b class="fa fa-angle-right"></b></a>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="http://bkk.nhso.go.th/OPBKK/"target="_blank"><span>โปรแกรมฐานข้อมูลผู้ป่วยนอก (OPBKKClaim)</span></a></li>
                  <li><a href="https://bkkweb.nhso.go.th/PCCWebService/login.do"target="_blank"><span>ระบบโปรแกรมบันทึกข้อมูล PCC </span></a></li>
                </ul>
              </li>
              <li><a href="#">ระบบงาน PP <b class="fa fa-angle-right"></b></a>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="http://bkk.nhso.go.th/pp57/ "target="_blank"><span>P&P นอก</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/bkkppin/"target="_blank"><span>P&P ในหน่วยบริการ</span></a></li>
                  <li><a href="http://bkk2.nhso.go.th/ppclub/"target="_blank"><span> ชมรมสร้างเสริมสุขภาพและป้องกันโรค </span></a></li>
						      <li><a href="http://bkk2.nhso.go.th/HHCRefer2015/"target="_blank"><span> ระบบการส่งต่อ/ตอบกลับข้อมูลการดูแลผู้ป่วยที่บ้าน(HHCRefer)</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/bppdsweb/"target="_blank"><span> โปรแกรมสร้างเสริมสุขภาพและป้องกันโรค (BPPDS) </span></a></li>
                  <li><a href="http://bkk2.nhso.go.th/bcpweb/"   target="_blank"><span>ระบบบันทึกข้อมูลปรับเปลี่ยนพฤติกรรม</span></a></li>
                  <li><a href="http://bkkweb.nhso.go.th/fctweb/frontpage/login.jsp" target="_blank"><span>ระบบบันทึกข้อมูลทีมหมอครอบครัว</span></a></li>
                </ul>
              </li>
              <li><a href="#">ระบบงาน IP <b class="fa fa-angle-right"></b></a>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="http://bkk.nhso.go.th/budget/" target="_blank"><span>รายการเบิกจ่าย</span></a></li>
                </ul>
              </li>
              <li><a href="#">ระบบงาน Audit <b class="fa fa-angle-right"></b></a>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="http://bkkweb.nhso.go.th/ipappeal/" target="_blank"><span>ระบบอุทธรณ์และตรวจสอบข้อมูลผู้ป่วยใน เขต กทม.</span></a></li>
                </ul>
              </li>
              <li><a href="#">ระบบลงทะเบียนสิทธิ์ <b class="fa fa-angle-right"></b></a>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="http://bkk.nhso.go.th/newregister/"><span>ลงทะเบียนผู้มีสิทธิหลักประกันสุขภาพถ้วนหน้า</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/manual_service.php" target="_blank"><span>คู่มือการใช้ระบบสารสนเทศ</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/news/showallcn.php"><span>หนังสือเวียน</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/faxonline/" target="_blank"><span>ระบบส่งเอกสารออนไลน์</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/conference/login.php"><span>Meeting System</span></a></li>
                </ul>
              </li>
              <li><a href="#">ระบบรายงานต่างๆ <b class="fa fa-angle-right"></b></a>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="http://bkk.nhso.go.th/linkbudget/index.php" target="_blank"><span>รายละเอียดงบประมาณกองทุนต่างๆ ที่จัดสรรให้หน่วยบริการใน กทม.</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/qof2018/index.php">ระบบกำกับติดตามตัวชี้วัดเกณฑ์คุณภาพและผลงานบริการปฐมภูมิ</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/pp/stat/mcupmap.php"><span>บัญชีเครือข่าย</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/login.php"><span>Upload Download</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/ip_normal/"><span>ตรวจสอบการขอเบิกชดเชยค่าบริการทางการแพทย์ กรณีผู้ป่วยใน(กรณี RW<4) ปีงบประมาณ 2550 กองทุนผู้ป่วยในสำนักสาขากรุงเทพมหานคร</span></a></li>
                  <li><a href="http://bkkmis.nhso.go.th/mispp/ "target="_blank"><span>ระบบ MIS CENTER</span></a></li>
                </ul>
              </li>
              <li><a href="#">Upload/Download <b class="fa fa-angle-right"></b></a>
                <ul class="dropdown-menu sub-menu">
                  <li><a href="http://bkk.nhso.go.th/UploadDownload/claimupload.php"><span>ส่งข้อมูล E-Claim กทม.</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/UploadDownload/rtrupload.php"><span>ส่งข้อมูล Return ประจำรอบ</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/UploadDownload/ipopupload.php"><span>ส่งข้อมูล IP/OP ประจำเดือน</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/UploadDownload/FormUpload.php?type=DBpop"><span>ส่งข้อมูล Update OFC,SSS และ Other สำหรับ Admin</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/UploadDownload/rtrdownload.php"><span>Download ข้อมูล Return ประจำรอบ</span></a></li>
                  <li><a href="http://bkk.nhso.go.th/UploadDownload/ipopdownloadall.php"><span>Download ข้อมูล IP / OP ประจำรอบ</span></a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">พนักงานบริการงานลงทะเบียน <i class="fa fa-angle-down fa-md"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="http://bkk.nhso.go.th/timework/"><span>ลงเวลาปฏิบัติงาน</span></a></li>
              <li><a href="http://bkk.nhso.go.th/ma/login.php"><span>แจ้งข้อมูลอุปกรณ์</span></a></li>
              <li><a href="http://bkk.nhso.go.th/imexasset/index.php"><span>ระบบเบิกพัสดุ</span></a></li>
              <li><a href="http://bkk.nhso.go.th/va/"><span>ระบบการบำรุงสารสนเทศ</span></a></li>
              <li><a href="http://bkk.nhso.go.th/login.php"><span>ตรวจสอบสิทธิ์</span></a></li>
              <li><a href="http://bkk.nhso.go.th/pp/stat/mcupmap.php"><span>บัญชีเครือข่าย</span></a></li>
              <li><a href="http://bkk.nhso.go.th/news/loginzonenews.php"><span>แจ้งข่าวสำหรับพนักงานทะเบียน</span></a></li>
              <li><a href="http://www.sso.go.th/wpr/login.jsp"><span>ตรวจสอบสิทธิ์ประกันสังคม</span></a></li>
              <li><a href="http://www.sso.go.th/wpr/home.jsp"><span>สำนักงานประกันสังคมทั่วประเทศ</span></a></li>
              <li><a href="http://bkk.nhso.go.th/newregister/"><span>ลงทะเบียนผู้มีสิทธิหลักประกันสุขภาพถ้วนหน้า</span></a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ตรวจสอบสิทธิ์ <i class="fa fa-angle-down fa-md"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="http://bkk.nhso.go.th/login.php"><span>สปสช.กทม.</span></a></li>
              <li><a href="http://ucsearch.nhso.go.th/ucsearch/index.jsp"><span>สปสช.</span></a></li>
              <li><a href="http://www.sso.go.th/wpr/home.jsp"><span>ประกันสังคม</span></a></li>
              <li><a href="http://welcgd.cgd.go.th/wel/login.jsp"><span>กรมบัญชีกลาง</span></a></li>
            </ul>
          </li>
          <li><a href="news/newslist">ข่าวประชาสัมพันธ์</a></li>
          <li><a href="https://bkk.nhso.go.th/main/contact.php">ติดต่อเรา</a></li>
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
      <div class="col-lg-12 col-md-6 col-sm-6">
        <!-- <div class="slick_slider" id="newsSlider"> -->
          <table class="table" id="dataTables" >
            <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" aria-sort="ascending" style="width: 10px;">ลำดับ</th>
                  <th class="" tabindex="0" aria-controls="dataTables-example" style="width: 200px;">หัวข้อข่าว</th>
                  <th class="" tabindex="0" aria-controls="dataTables-example" style="width: 50px;">หมวดหมู่</th>
                  <th class="" tabindex="0" aria-controls="dataTables-example" style="width: 50px;">วันเริ่มต้น</th>
                  <th class="" tabindex="0" aria-controls="dataTables-example" style="width: 50px;">วันสิ้นสุด</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- </div> -->
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

<script>
var response = <?php echo json_encode($jsonnewslist);?>;

      $.each(response, function(i, item) {
          var $tr = $('<tr>').append(
              $('<td align="center" >').text(item.NO),
              // $('<td>').html('<a href="news/newspage/'+item.NEWS_ID+'" target="_blank">'+item.N_TITLE +'</a><br><p style="font-size:12px; color:#b5b5b5;">ผู้เขียน : '+item.USERNAME+'</p>'),
              $('<td>').html('<a href="news/newspage/'+item.NEWS_ID+'" target="_blank">'+item.N_TITLE +'</a>'),
              $('<td>').text(item.N_CATEGORY),
              $('<td>').text(item.N_START_DATE),
              $('<td>').text(item.N_END_DATE),
          ).appendTo('#dataTables');

          if (i < 9){
              var $li = $('<li>').append(
                $('<a href="news/newspage/'+item.NEWS_ID+'">').html('<img src="upload/if_256_colors_131813.png" alt="">' + item.N_TITLE)
                // $('<a href="href="news/newspage/'+news.NEWS_ID+'">').html('<i class="fa fa-bullhorn" style="font-size:20px;"/>' + news.N_TITLE)
              ).appendTo('#ticker01');
          }
      });

    $(document).ready(function() {
        $("#dataTables").DataTable({
          order: [[ 0, "desc" ]],
          rowReorder: {
              selector: 'td:nth-child(1)'
          },
          responsive: true,
        });

        console.log($("#dataTables_filter"));
    });
</script>
</body>
</html>
