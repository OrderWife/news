<!-- DataTables CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Sweetalert -->
<script src="<?php echo base_url()."assets/plugins/sweetalert/sweetalert.min.js"?>"></script>

<!-- Custom Fonts -->
<link href="<?php echo base_url();?>assets/startmin-master/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script src="<?php echo base_url()."assets/plugins/dateformat/date.format.js"?>"></script>

<script type="text/javascript">

var response = <?php echo json_encode($query); ?>;
$(function() {
  try {
    $.each(response, function(i, item) {
        var $tr = $('<tr>').append(
            $('<td align="center" >').text(item.NO),
            $('<td>').text(item.N_CATEGORY),
            $('<td>').text(item.N_TITLE),
            $('<td>').text(item.N_START_DATE),
            $('<td>').text(item.N_END_DATE),
            // $('<td>').text(item.N_LAST_EDIT),
            $('<td align="center" >').html('<button type="button" style="float:center;" class="btn btn-warning btn-sm"  onclick="editData('+item.NEWS_ID+')"><b class="fa fa-edit"></b></button> <button type="button" style="float:center;" class="btn btn-danger btn-sm" onclick=(delData('+item.NEWS_ID+'))><b class="fa fa-remove"></b></button>'),
        ).appendTo('#dataTables-example');
    });
  } catch (e) {
    return;
  }
});

var resDataList = <?php echo json_encode($listCate); ?>;
$(function() {
  try {
    $.each(resDataList, function(i, item) {
        var $list = $('<option>').val(item.CATEGORY).appendTo('#list_category');
    });
  } catch (e) {
    return;
  }
});

function delData(btn)
  {
    var link = "<?php echo base_url().'index.php/Backend/deleteNews/';?>"+btn;
    swal({
      title: "ต้องการลบข่าวนี้ จริงหรอ ?",
      text: "หากลบข่าวนี้ ภาพและไฟล์ของข่าวจะถูกลบออกไปด้วย !",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        $.post(link).then
        swal("ข่าวถูกลบเรียบร้อยแล้ว ! ", {
            icon: "success",
            button: "ตกลง"
          }).then(function(){
            window.location = "<?php echo base_url(). 'backend/'?>";
          });
        }
      });
  }
var itemFiles;
function editData(id) {
  $('#news').attr('action', 'backend/savenews/'+id);
  console.log($('#news').attr('action'));
  $('#form-box').removeClass('hide');
  $('#table_box').addClass('hide');
  var btnYN = document.getElementById('btn-yes-no');
  btnYN.className = 'btn btn-danger btn-lg';
  btnYN.innerHTML = 'ยกเลิก';

  $.getJSON( "./backend/edit/"+id, function( jsonObj ) {
    $.each(jsonObj, function(i, item){
      switch (i) {
        case 'NEWS':
          $.each(item, function(i, news){
            //console.log(news);
            $('#title').val(news.N_TITLE);
            $('#category').val(news.N_CATEGORY);
            $('#tag').tagsinput('add',news.N_TAG);
            //console.log(news.N_TAG);
            $('#startdate').val(news.START_DATE);
            $('#enddate').val(news.END_DATE);
            myEditor.setData(news.N_CONTENT);//obj-> "myEditor" form newsform.php.
            if(news.N_IMG!='null'){
              $("#showimg").removeClass('hide');
              $("#blah").attr('src','<?php echo base_url()?>upload/'+news.N_IMG).width(300).height(200);
              $("#imgUp").attr('imgname',news.N_IMG);
            }else{
              $("#imgUp").attr('imgname',null);
            }
        }); //loop
        break;
        case 'FILES':
            $('#uploadTips').append( '<p id="delTips" style="color:red;" >*โปรดระวังการลบไฟล์ หากลบไฟล์แล้วจะไมสามารถทำการกู้คืนได้น่ะครับ ^_^*</p>' );
            var PreviewfileInnitial = new Array();
            var initialConfig = {};
            var dataJson = [];
            initialConfig.dataJson = dataJson;
            var urlDel = "<?php echo base_url();?>backend/delfileimg/";
            itemFiles = item;
            $.each(item, function(i, files){
              PreviewfileInnitial[i] = "<?php echo base_url();?>upload/"+files.N_FILE;
              var data = {};
              data['caption']= files.N_ORIGNAME ;
              data['size']= files.N_SIZE;
              data['url'] = urlDel+files.N_FILE;
              //data['url'] = PreviewfileInnitial[i];
              data['key'] = i+1;
              initialConfig.dataJson.push(data);
            });
            //console.log(JSON.stringify(initialConfig));
            //console.log(JSON.stringify(initialConfig.dataJson));
            //var json = JSON.stringify(initialConfig.dataJson);
            //console.log(dataJson);
            $("#file").fileinput('destroy');

            $("#file").fileinput({
                theme: 'fa',
                showUpload: false,
                showCaption: false,
                dropZoneEnabled: false,
                browseClass: "btn btn-primary",
                overwriteInitial: false,
                initialPreviewAsData: true,
                 initialPreview: PreviewfileInnitial,
                 initialPreviewConfig:dataJson,
                 preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
             previewFileIconSettings: { // configure your icon file extensions
                 'doc': '<i class="fa fa-file-word-o text-primary"></i>',
                 'xls': '<i class="fa fa-file-excel-o text-success"></i>',
                 'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                 'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
                 'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
                 'htm': '<i class="fa fa-file-code-o text-info"></i>',
                 'txt': '<i class="fa fa-file-text-o text-info"></i>',
                 'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
                 'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
                 'jpg': '<i class="fa fa-file-photo-o text-danger"></i>',
                 'gif': '<i class="fa fa-file-photo-o text-muted"></i>',
                 'png': '<i class="fa fa-file-photo-o text-primary"></i>'
             },
             previewFileExtSettings: { // configure the logic for determining icon file extensions
                 'doc': function(ext) {
                     return ext.match(/(doc|docx)$/i);
                 },
                 'xls': function(ext) {
                     return ext.match(/(xls|xlsx)$/i);
                 },
                 'ppt': function(ext) {
                     return ext.match(/(ppt|pptx)$/i);
                 },
                 'zip': function(ext) {
                     return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
                 },
                 'htm': function(ext) {
                     return ext.match(/(htm|html)$/i);
                 },
                 'txt': function(ext) {
                     return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
                 },
                 'mov': function(ext) {
                     return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                 },
                 'mp3': function(ext) {
                     return ext.match(/(mp3|wav)$/i);
                 }
             }
            });
            // console.log($("#file"));
            // console.log(fileInnitial);
        break;
        default:
      }
          }); // loop
      });

}
</script>

<script>
    $(document).ready(function() {
        $("#dataTables-example").DataTable({
          rowReorder: {
              selector: 'td:nth-child(2)'
          },
          responsive: true,
        });
    });
</script>
