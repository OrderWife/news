<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> ข่าว </title>

        <?php $this->load->view('backendview/include/include_v'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style media="screen">
            ul.nobullet {
                list-style-type: none;
                }

        </style>
    </head>
    <body>

        <div id="wrapper">
            <!-- Page Content -->
            <!-- <div id="page-wrapper"> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <h3 class="page-header">
                              <i class="fa fa-newspaper-o" style="font-size:32px;"></i>
                              <span id="title1"></span>
                            </h3>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                      <div class="content col-md-12 col-sm-6">
                        <div id="content" class="container">

                        </div>
                      </div>
                    </div>
                    <!-- /.row -->
                    <div class="row" style="padding-top: 15px;padding-bottom: 15px;margin-top: 25px;">
                        <div class="container">
                          <div class="" style="float:left">
                            <div class="" id="hideDownload">
                              <p align="center" style="font-size:20px">เอกสารแนบ</p>
                              <ul id="download" class="nobullet" >
                              </ul>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            <!-- </div> -->
            <!-- /#page-wrapper -->
        </div>
    </body>
</html>

<script type="text/javascript">
  var data = <?php echo $newsDetail; ?>;
  var files = <?php echo $filename; ?>;
  $.each(data, function(index, el) {
              $('<span>').text(el.N_TITLE).appendTo('#title1');
              $('<div>').html(el.N_CONTENT).appendTo('#content');
  });
  console.log('File : ' + files.length);
if (files.length == 0) {
  $('#hideDownload').addClass('hide');
}else{
  $.each(files, function(index, item) {
              $('<li>').append(
                 $('<span>').html('<i class="fa fa-download" style="font-size:20px;"><a href="#" style="font-size:14px;"> '+" "+item.N_ORIGNAME+'</a></i>')
              ).appendTo('#download');
  });
}

</script>
