<link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<link href="<?php echo base_url();?>/assets/plugins/dropzone/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url();?>/assets/plugins/dropzone/dropzone.js"></script>

<div class="col-md-12" >
  <div class="col-md-5 col-md-offset-1">
    <div class="form-group">
      <div class="form-group">
        <label>หัวข้อ</label>
        <input class="form-control" placeholder="กรุณากรอกชื่อหัวข้อข่าว">
      </div>
      <div class="form-group">
        <label>หมวดหมู่</label>
        <input class="form-control" list="browsers" name="browser" placeholder="กรุณาเลือกหมวดหมู่">
        <datalist id="browsers">
          <option value="Internet Explorer">
          <option value="Firefox">
          <option value="Chrome">
          <option value="Opera">
          <option value="Safari">
        </datalist>
      </div>
      <div class="form-group col-md-6" style="padding-right:20px">
          <label>วันเริ่มต้น</label>
          <input id="startdate" type="date" class="form-control" readonly>
      </div>
      <div class="form-group col-md-6" >
          <label>วันสิ้นสุด</label>
          <input id="enddate" type="date" min="<?php echo date("Y-m-d")?>" class="form-control">
          <input type="checkbox" id="unlimit" value="unlimit">ไม่สิ้นสุด
      </div>


    </div>
  </div>
  <div class="col-md-5 col-md-offset-1">
    <div class="form-group">
        <label>ภาพ</label>
        <div id="showimg" class="" style="background-color: lightgrey; width: 200px; height:200px;">
          <img id="blah" src="#" alt="your image" />
        </div><br>
        <input type="file" onchange="readURL(this);">
    </div>
  </div>
</div>
<div class="col-md-10 col-md-offset-1" >
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">เนื้อหาข่าว</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea required class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </form>
            </div>
          </div>

          <div id="dropzone">
            <form action="dropupload" class="dropzone needsclick dz-clickable" id="drops">
            <div class="dz-message needsclick">
              Drop files here or click to upload.<br>
            </div>

          </form>
        </div>
</div>


<script type="text/javascript">
  $(function(){
    document.getElementById("startdate").value="<?php echo date("Y-m-d")?>";
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()

    $("div#drops").dropzone({ url: "/file/post/file" });
  });
  $( "input" ).change(function() {
    var input = $( this );
    var d = document.getElementById("enddate");
      if (input.prop( "checked" )) {
        d.disabled = true;
      }else{
        d.disabled = false;
      }
  }).change();

  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showimg').removeClass('hide');
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }else{
          $('#showimg').addClass('hide');
        }
    }
</script>
