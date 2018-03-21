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
      border-bottom: 6px solid #FFF;
      /* background-color: pink; */
      /* float: none; */
      /* padding: 10px; */
      /* -moz-box-shadow:    inset 0 0 10px #000000; */
      /* -webkit-box-shadow: inset 0 0 10px #000000; */
      box-shadow:   0 5px 4px -2px #000000;
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

    div > i.fa{
      padding: 4px 5px;
      border: 1.5px solid #000;
      background-color: rgba(88, 88, 88,0.42);
      overflow: hidden;
      z-index: 2;
    }
    </style>
  </head>
  <body>
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
        <div class="col-md-12">
          <div class="row">

          <div id="1" class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
              <label>[ file_name X ]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name ]</label>
            </div>
          </div>
          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name ]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
          <label>[ file_name ]</label>
            </div>
          </div>
          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name XX ]</label>
            <label style="display:none">[jpeg]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
          <label>[ file_name ]</label>
            </div>
          </div>
          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name ]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
          <label>[ file_name XXX ]</label>
            </div>
          </div>
          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name ]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
          <label>[ file_name ]</label>
            </div>
          </div>
          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name ]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
          <label>[ file_name ]</label>
            </div>
          </div>
          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name ]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
          <label>[ file_name ]</label>
            </div>
          </div>
          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                  <i class="fa fa-folder sizeCustom"></i>
              </div>
            <label>[ file_name ]</label>
            </div>
          </div>

          <div class="col-md-2 simulate">
            <div class="">
              <div class="">
                <i class="fa fa-folder sizeCustom"></i>
              </div>
          <label>[ file_name ]</label>
            </div>
            X
          </div>

        </div>
        <!-- end row -->
        </div>

      </div>

    </div>

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button"  onclick="logcolor()" class="btn btn-default" data-dismiss="modal">Submit</button>
        </div>
      </div>

    </div>
  </div>

</div>

    <script>

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


      var pid = 1;
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
        // console.log('Hello');
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
                 case "custom":$("#myModal").modal();
                   break;
                 default:

               }
           },
           items: {
               "describe": {name: "รายละเอียด", icon: "fa-align-left"},
               "sep1": "---------",
               "rename": {
                 name: "เปลียนชื่อ",
                 icon: "fa-edit",
                 disabled: function(key, opt) {
                    // this references the trigger element
                    // console.log(pid==key);
                    return pid==key;
                },
              },
               "share": {
                 name: "แชร์",
                 icon: "fa-share",
                 disabled: function(key, opt) {
                    // this references the trigger element
                    console.log(this.data('cutDisabled'));
                    return this.data('cutDisabled');
                },
              },
               "delete": {
                 name: "ลบ",
                 icon: "fa-trash",
                 disabled: function(key, opt) {
                    // this references the trigger element
                    return this.data('cutDisabled');
                },
              },
               "sep2": "---------",
               "custom":{
                 name: "รูปแบบ",
                 icon: "fa-paint-brush",
                 disabled: function(key, opt) {
                    // this references the trigger element
                    return this.data('cutDisabled');
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

  // colorPicker = document.querySelector("#colorPicker");
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
      $(".selected").children('div').children('i').attr('class', 'fa sizeCustom '+icon);
    }

  }

  function isDisible(var pid) {
    
  }

    </script>

  </body>
</html>
