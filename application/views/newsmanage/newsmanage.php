<h1 class="page-header">จัดการบริหารข่าว
  <button id="btn-yes-no" type="button" style="float:right;" class="btn btn-success btn-lg" onclick="showform()">เพิ่มข่าว</button>
</h1>
<!-- data Table -->
<div class="panel panel-default">
<div class="panel-heading" id="panel-header">
    จัดการข่าวสาร
</div>
<!-- /.panel-heading -->
<div class="panel-body" id="panel_body">
  <!-- News_table -->
  <div class="" id="table_box"> <!--hide-->
    <div class="dataTable_wrapper">
        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          <div class="row">
             <div class="col-md-12">
                  <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                    <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" style="width: 60px;">ลำดับ</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">หมวดหมู่</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 50px;">หัวข้อข่าว</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">วันเริ่มต้น</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">วันสิ้นสุด</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">แก้ไขล่าสุด</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">แก้ไข/ลบ ข่าว</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
    <!-- /.table-responsive -->
    <!-- footer table -->
    <!-- <div class="well">
    </div> -->
    <!-- /.footer table -->
  </div>
  <!--/.News_table -->
  <!-- form Create&Edit News -->
  <div class="hide" id="form-box">
      <?php $this->load->view('newsmanage\newsform');?>
  </div>
  <!-- form Create&Edit News -->
</div>
<!-- /.panel-body -->
</div>

<script type="text/javascript">
  function showform() {
    var boxTable = document.getElementById('table_box');
    var boxForm = document.getElementById('form-box');
    var box = document.getElementById('news');
    var btnYN = document.getElementById('btn-yes-no');
    var classN = boxTable.className;
    if(classN == 'hide' || btnYN.innerHTML == 'ยกเลิก')
    {
      btnYN.className = 'btn btn-success btn-lg';
      btnYN.innerHTML = 'เพิ่มข่าว'
      boxTable.className = '';
      $('#showimg').addClass('hide');
      box.reset();
      $('#tag').tagsinput('removeAll');
      boxForm.className  = 'hide';
      $("#file").fileinput('destroy');
      $("#file").fileinput({
          theme: 'fa',
          showUpload: false,
          showCaption: false,
          dropZoneEnabled: false,
          browseClass: "btn btn-primary",
          overwriteInitial: false,
      });
      $('#delTips').replaceWith();
    }else{
      $('#news').attr('action', 'index.php/backend/createnews');
      $('#delTips').replaceWith();
      //console.log($('#news').attr('action'));
      btnYN.className = 'btn btn-danger btn-lg';
      btnYN.innerHTML = 'ยกเลิก'
      boxTable.className = 'hide';
      boxForm.className  = '';
      document.getElementById("startdate").value="<?php echo date("Y-m-d")?>";

    }
  }
</script>
