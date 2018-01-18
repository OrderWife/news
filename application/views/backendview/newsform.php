<div class="col-md-12">
  <form class="" method="post">
    <div class="col-md-12" >
      <div class="col-md-5 col-md-offset-1">
          <div class="form-group">
            <label>หัวข้อ</label>
            <input class="form-control" type="text" name="title" placeholder="กรุณากรอกชื่อหัวข้อข่าว" required>
          </div>
          <div class="form-group">
            <label>หมวดหมู่</label>
            <input class="form-control" type="text" list="browsers" name="category" placeholder="กรุณาเลือกหมวดหมู่" required>
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
              <input id="startdate" name="startdate" type="date" class="form-control" readonly>
          </div>
          <div class="form-group col-md-6" >
              <label>วันสิ้นสุด</label>
              <input id="enddate" type="date" name="enddate" min="<?php echo date("Y-m-d")?>" class="form-control" required>
              <input type="checkbox" id="unlimit" value="unlimit">ไม่สิ้นสุด
          </div>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <div class="form-group">
            <label>ภาพ</label>
            <div id="showimg" class="form-control" style="background-color: lightgrey; width: 200px; height:200px;">
              <img class="form-control" id="blah" src="#" alt="your image" />
            </div><br>
            <input type="file" onchange="readURL(this);">
        </div>
      </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <div class="form-group" >
        
      </div>
      </div>
    </div>

    <button type="submit" class="btn btn-default">Submit Button</button>
  </form>
</div>


<script type="text/javascript">
  $(function(){
    document.getElementById("startdate").value="<?php echo date("Y-m-d")?>";
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
