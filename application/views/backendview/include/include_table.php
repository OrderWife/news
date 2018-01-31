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
            $('<td>').text(item.N_CATEGORY),
            $('<td>').text(item.N_TITLE),
            $('<td>').text(item.N_START_DATE),
            $('<td>').text(item.N_END_DATE),
            $('<td>').text(item.N_LAST_EDIT),
            $('<td align="center" >').html('<button type="button" style="float:center;" class="btn btn-warning btn-sm"  onclick="editData('+item.NEWS_ID+')"><b class="fa fa-edit"></b></button> <button type="button" style="float:center;" class="btn btn-danger btn-sm" onclick=(delData('+item.NEWS_ID+'))><b class="fa fa-remove"></b></button>'),
        ).appendTo('#dataTables-example');
        // data-toggle="modal" data-target="#myModal"
    });
  } catch (e) {
    return;
  }
});

function delData(btn)
  {
    var link = "<?php echo base_url().'index.php/Backend/deleteNews/';?>"+btn.value;
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
            window.location = "<?php echo base_url(). 'index.php/backend/'?>";
          });
        }
      });
  }

function editData(id) {
  $('#form-box').removeClass('hide');
  $('#table_box').addClass('hide');
  var btnYN = document.getElementById('btn-yes-no');
  btnYN.className = 'btn btn-danger btn-lg';
  btnYN.innerHTML = 'Cancel';

  $.getJSON( "./edit/"+id, function( jsonObj ) {
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
            }
        }); //loop
        break;
        case 'FILES': console.log(item);
            $.each(item, function(i, files){
              console.log(files);
            });
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
                responsive: true
        });
    });
</script>
