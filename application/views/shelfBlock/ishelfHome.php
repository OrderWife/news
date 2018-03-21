<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I Shelf</title>
    <base href="<?echo base_url();?>" target="_blank">
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/startmin-master/css/font-awesome.min.css">
    <link href="../assets/plugins/fontawesome-with-css/css/fontawesome-all.css" rel="stylesheet">
    <script src="../assets/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <link href="../assets/plugins/jQuery-contextMenu/dist/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
    <script src="../assets/plugins/jQuery-contextMenu/dist/jquery.contextMenu.min.js"></script>
    <script src="../assets/plugins/jQuery-contextMenu/src/jquery.contextMenu.js"></script>
    <script src="../assets/plugins/jQuery-contextMenu/src/jquery.ui.position.js"></script>

    <link href="../assets/plugins/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css" rel="stylesheet">
    <script src="../assets/plugins/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script src="../assets/jsdotdotdot/jquery.dotdotdot.js"></script>

    <!-- <link rel="stylesheet" href="https://swisnl.github.io/jQuery-contextMenu/css/screen.css" type="text/css"/> -->
    <!-- <link rel="stylesheet" href="https://swisnl.github.io/jQuery-contextMenu/css/theme.css" type="text/css"/> -->
    <!-- <link rel="stylesheet" href="https://swisnl.github.io/jQuery-contextMenu/css/theme-fixes.css" type="text/css"/> -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/github.min.css"> -->
    <!-- <link href="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.css" rel="stylesheet" type="text/css" /> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- <script src="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.js" type="text/javascript"></script> -->

    <!-- <script src="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.ui.position.min.js" type="text/javascript"></script> -->

    <!-- <script src="https://swisnl.github.io/jQuery-contextMenu/js/main.js" type="text/javascript"></script> -->


    <style media="screen">
    .simulate{
      text-align: center;
      color: #FFF;
      padding-top: 5px;
      margin-top: 2%;
      margin-bottom: 2%;
      /* border-bottom: 6px solid #FFF; */
      /* background-color: pink; */
      /* float: none; */
      /* padding: 10px; */
      /* -moz-box-shadow:    inset 0 0 10px #000000; */
      /* -webkit-box-shadow: inset 0 0 10px #000000; */
      /* box-shadow:   0 5px 4px -2px #000000; */
    }
    .bgBody{
      padding: 1%;
      border: 8px solid #804000;
      background-image:url("../assets/img/wall_shelf.png");
      /* background-repeat: repeat-y; */
      background-position: center;
      /* background-size: 800px 800px; */
      box-shadow: 5px 10px #888888;
      z-index: -2;

    }
    /* .selected{
      border: 1px solid #000;
    } */
    .simulate div.selected{
      padding-top: 5px;
      border: 1px solid #000;
      -moz-box-shadow:    inset 0 0 10px #000000;
      -webkit-box-shadow: inset 0 0 10px #000000;
      box-shadow:         inset 0 0 10px #000000;
    }
    .shadow {
     -moz-box-shadow:    inset 0 0 16px #000000;
     -webkit-box-shadow: inset 0 0 16px #000000;
     box-shadow:         inset 0 0 16px #000000;
    }
    .container{
      padding: auto;
      /* padding-left: 6%; */
      /* padding-right: auto; */
      /* background-color: green; */
    }

    .sizeCustom{
      font-size: 50px;
    }
    input[type="color"] {
    	-webkit-appearance: none;
    	border: 1px solid #000;
    	width:64px;
    	height:32px;
    }
    input[type="color"]::-webkit-color-swatch-wrapper {
    	padding: 0;
    }
    input[type="color"]::-webkit-color-swatch {
    	border: none;
    }

    div > span.fa{
      padding: 0px 5px;
      padding-bottom: .2em;
      /* border: 1.5px solid #000; */
      /* background-color: rgba(88, 88, 88,0.42); */
      /* overflow: hidden; */
      /* z-index: 2; */
    }
    label.dot{
      font-size:1em;
      line-height:1em;
      height: 1em;
      width: 8em;
      text-overflow: ellipsis;
    }
    .calendar-text { margin-top: .5em; margin-left: .5em;}
    body.bodybg {
      background-color: rgba(247,221,212, 0.71);
    }

    </style>
  </head>
  <body class="bodybg" >
    <?php echo base_url() ?>
    <div class="container">
      <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><b class="fa fa-search"></b></div>
    </div>
    <input id="search" type="text" class="form-control" name="" value="" placeholder="ค้นหาไฟล์">
  </div>
    </div>

    <div class=" ">
      <div class="container bgBody shadow">
        <div class="col-md-12 transbox">
          <div id="boxcontent" class="row">

          </div>
        <!-- end row -->
        </div>

      </div>

    </div>

    <!-- Modal -->
  <div class="modal fade" id="ModalCustomStyle" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">เปลี่ยนรูปแบบ Icon</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 .col-sm-6">
              <label>เลือก Icon </label><br>
              <div class="btn-group">
                <button type="button" class="btn btn-default iconpicker-component"><b class="sizeCustom"><i class="fa fa-fw fa-folder"></i></b></button>
                <button type="button" class="icp icp-dd btn btn-default dropdown-toggle" data-selected="fa-car" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                  <div class="dropdown-menu"></div>
              </div>
            </div>
            <div class="col-md-4 .col-sm-4">
              <label>เลือกสี </label><br>
              <input id="colorPicker" type="Color" name="" value="#FFFFFF">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button"  onclick="logcolor()" class="btn btn-success" data-dismiss="modal">Submit</button>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="ModelDescribe" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">รายละเอียด</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <p id="Name">ชื่อไฟล์    : aaaaaa</p>
            <p id="Type">ชนิด    : BBBBBB</p>
            <p id="Owner">เจ้าของ    : CCCCCC</p>
            <p id="createDate">วันที่สร้าง   : DDDDDD</p>
            <p id="sizeFile">ขนาดไฟล์   : 10000000.992mb</p>
            <p>
              <blockquote>
                <p id="discribe">รายละเอียด : test</p>
              </blockquote>
            </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <script>
    var response = <?php echo $files; ?>;
    var strPath = '<?php echo str_replace('=','',base64_encode($basePath)) ;?>';
    var upPath = '<?php echo $upPath; ?>';
    var OrigName = <?php echo $filesOrig; ?>;
    var pid = '<?php echo $id;?>';
    var getShare = <?php if(isset($getShare)){echo $getShare;}else{echo json_encode(array());}?>;

    //<a href="Myshelf/viewimg/'+ item['path'] +'/' + item['fn'] + '" target="_blank">
    //<a href="Myshelf/download/'+ item['path'] +'/'+ item['fn'] + '">

    $.each(OrigName, function(i, item) {
      if (item == null){
        return;
      }
      var owner = true;
      if(pid!=item[3] && (item[4] == 'm')){
        // Don't see file if not owner of file.
        return;
      }else if(pid!=item[3] && item[4] == 'g'){
        // Can see if owner of a file share to user.
        owner = false;
      }else if( pid!=item[3] ){
        var out = false;
        guest = item[4].split(',');
        for (var c = 0; c < guest.length; c++) {
          if(pid != guest[c]){
            out = true;
            owner = false;
          }else{
            out = false;
            owner = false;
            break;
          }
        }
        if (out) { //ถ้าไม่ได้ถูกแชร์จะไม่สามารถมองเห็นไฟล์ได้
          return;
        }
      }
      var folderIcon = "fa-folder";
      var type = "[ folder ]";
      var typeofFiles = getExtension(item[7]);
      if(isDocEx(typeofFiles)){
        folderIcon = "fa-file-excel";
        type = "[Excel "+typeofFiles+"]";
      }else if(isDocPp(typeofFiles)){
        folderIcon = "fa-file-powerpoint";
        type = "[Powerpoint "+typeofFiles+"]";
      }else if(isZip(typeofFiles)){
        folderIcon = "fa-file-archive";
        type = "[Archive "+typeofFiles+"]";
      }else if(isTxt(typeofFiles)){
        folderIcon = "fa-file-alt";
        type = "[Text "+typeofFiles+"]";
      }else if(isMov(typeofFiles)){
        folderIcon = "fa-file-video";
        type = "[Video "+typeofFiles+"]";
      }else if(isPdf(typeofFiles)){
        folderIcon = "fa-file-pdf";
        type = "["+typeofFiles+"]";
      }else if(isImage(typeofFiles)){
        folderIcon = "fa-file-image";
        type = "[image "+typeofFiles+"]";
      }else if(isDoc(typeofFiles)){
        folderIcon = "fa-file-word";
        type = "[Word "+typeofFiles+"]";
      }
      // console.log(response[i]['fz']);
      var $div = $('<div class="col-sm-3 col-md-2  simulate">').append(
        $('<div title="'+item[0]+'">').append('<div class=""><span class="fa sizeCustom '+folderIcon+'"></span><i class="fa fa-users fa-stack-2x calendar-text" style="color:#1258DC;"></i></div>',
          $('<label class="dot">').html(item[0]),
          $('<label style="display:none">').text(type),
        ),
      ).appendTo('#boxcontent');

      console.log(owner && "คุณ" || item[5]);
      $div.data('owner',owner);
      $div.data('Name',item[0]);
      $div.data('Type',getExtension(item[7]));
      $div.data('OwnerFile', owner && "คุณ" || item[5]);
      $div.data('createDate',item[1]);
      $div.data('sizeFile',response[i]['fz'] && response[i]['fz'] || "-");
      $div.data('discribe',item[2] && item[2] || "-");

    });
    function getExtension(filename) {
        var parts = filename.split('.');
        if(parts.length > 1){
          return parts[parts.length - 1];
        }else{
          return "folder"
        }

    }

    $( "#search" ).keyup(function() {
      // console.log(this.value);
      if (this.value) {
        $("div.simulate:contains('"+this.value+"')" ).css( "display", "" );
        $("div.simulate:not(:contains('"+this.value+"'))" ).css( "display", "none" );
      }else{
        $("div.simulate").css( "display", "" );
      }

    });


    $.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function( elem ) {
        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
        };
    });

    var timer = false;
    $('div.simulate').on('click',function(event) {
      // console.log(event);
      if(!timer){
        timer = setTimeout(function(){
            timer=null
            //insert things you want to do when single tapped
        },200);
      }else{
        clearTimeout(timer); //stop single tap callback
        timer=null
        alert("You dbl Click! or Tap!");
      }
      event.preventDefault();
    });

    $(function() {
       $.contextMenu({
           selector: '.simulate',
           callback: function(key, options) {
               var m = key;
               switch (key) {
                 case "custom":$("#ModalCustomStyle").modal();
                   break;
                 case "describe":
                 $("p#Name").text('ชื่อไฟล์ : '+this.data('Name'));
                 $("p#Type").text('ชนิด : ' + this.data('Type'));
                 $("p#Owner").text('เจ้าของ : '+ this.data('OwnerFile'));
                 $("p#createDate").text('วันที่สร้าง : '+ this.data('createDate'));
                 $("p#sizeFile").text('ขนาดไฟล์ : '+ this.data('sizeFile'));
                 $("p#discribe").text('รายละเอียด : ' + this.data('discribe'));
                 $("#ModelDescribe").modal();
                   break;
                 default:

               }
           },
           items: {
               "describe": {name: "รายละเอียด", icon: "fa-align-left"},
               "download": {
                 name: "ดาวน์โหลด",
                 icon: "fa-download",
                 disabled:function(key, opt) {
                  return this.data('Type') == "folder";
              },
            },
               "sep1": "---------",
               "rename": {
                 name: "เปลียนชื่อ",
                 icon: "fa-edit",
                 disabled: function(key, opt) {
                    return !this.data('owner');
                },
              },
               "share": {
                 name: "แชร์",
                 icon: "fa-share",
                 disabled: function(key, opt) {
                    return !this.data('owner');
                },
              },
               "delete": {
                 name: "ลบ",
                 icon: "fa-trash",
                 disabled: function(key, opt) {
                    return !this.data('owner');
                },
              },
               "sep2": "---------",
               "custom":{
                 name: "รูปแบบ",
                 icon: "fa-paint-brush",
                 disabled: function(key, opt) {
                    return !this.data('owner') || (this.data('Type') != "folder");
                  },
                 },
           }
       });

       $('.simulate').on('click', function(e){
         var bool = $(e.currentTarget).children('div').hasClass('selected');
         if (!bool) {
           $('div').removeClass('selected');
           $(e.currentTarget).children('div').addClass('selected');
         }else{
           $(e.currentTarget).children('div').removeClass('selected');
         }
           // console.log('clicked', this);
       })

       $('.simulate').contextmenu(function(e){
         var bool = $(e.currentTarget).children('div').hasClass('selected');
         if (!bool) {
           $('div').removeClass('selected');
           $(e.currentTarget).children('div').addClass('selected');
         }else{

         }
           // console.log('right clicked', this);
       })
   });

  var icon;
  $('.icp-dd').iconpicker({
                          icons: ['fa-folder','fa-folder-open','fa-address-book','fa-book','fa-briefcase','fa-suitcase',
                          'fa-trash','fa-trash-alt','fa-th','fa-images',"fa-archive",'fa-file','fa-sticky-note','fa-paste','fa-paperclip',
                          'fa-question-circle','fa-envelope','fa-thumbtack','fa-inbox','fa-paper-plane','fa-hdd','fa-server',
                          'fa-money-bill-alt','fa-user-md','fa-medkit','fa-cloud-download-alt','fa-user'],
                      });
  $('.icp').on('iconpickerSelected', function(e) {
          console.log(e.iconpickerValue);
          if(e.iconpickerValue){
            icon = e.iconpickerValue;
          }else{
            console.log('null');
          }

        });
  function logcolor() {
    console.log($('#colorPicker').val());
    var color = $('#colorPicker').val();
    $(".selected").children('div').css({'color': color});
    if (icon) {
      $(".selected").children('div').children('span').attr('class', 'fa sizeCustom '+icon);
    }

  }

  function isImage(filename) {
      switch (filename.toLowerCase()) {
      case 'jpg':
      case 'gif':
      case 'bmp':
      case 'png':
          //etc
          return true;
      }
      return false;
  }

  function isDoc(filename) { //word
      var res = filename.match(/(doc|docx)$/i);
      if(res != null){
      	return true;
      }else{
      	return false;
      }
  }

  function isDocEx(filename) { //excel
      var res = filename.match(/(xls|xlsx)$/i);
      if(res != null){
      	return true;
      }else{
      	return false;
      }
  }

  function isDocPp(filename) { //powerpoint
      var res = filename.match(/(ppt|pptx)$/i);
      if(res != null){
      	return true;
      }else{
      	return false;
      }
  }

  function isZip(filename) { //Zip
      var res = filename.match(/(zip|rar|tar|gzip|gz|7z)$/i);
      if(res != null){
      	return true;
      }else{
      	return false;
      }
  }

  function isTxt(filename) { //Txt
      var res = filename.match(/(txt|ini|csv|java|php|js|css|html)$/i);
      if(res != null){
      	return true;
      }else{
      	return false;
      }
  }

  function isMov(filename) { //Mov
      var res = filename.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
      if(res != null){
      	return true;
      }else{
      	return false;
      }
  }

  function isPdf(filename) { //Pdf
      var res = filename.match(/(pdf)$/i);
      if(res != null){
      	return true;
      }else{
      	return false;
      }
  }

  $('label.dot').dotdotdot({
      ellipsis: '...', /* The HTML to add as ellipsis. */
      wrap : 'children', /* How to cut off the text/html: 'word'/'letter'/'children' */
      truncate: "letter",
      watch : true, /* Whether to update the ellipsis: true/'window' */
      // tolerance: 3,  /* Deviation for the measured wrapper height. */
      height: null,
      // width:10,
  });
    </script>

  </body>
</html>
