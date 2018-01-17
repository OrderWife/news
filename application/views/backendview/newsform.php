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
    <div class="form-group">
        <label>ภาพ</label>
        <div class="hide" style="background-color: lightgrey; width: 300px; height:300px; padding: 10px; margin: 10px;">
          <input type="image" scr="">
        </div>
        <input type="file">
    </div>
    <div class="form-group col-md-5" style="padding:0px">
        <label>วันเริ่มต้น</label>
        <input id="startdate" type="date" class="form-control" readonly>
    </div>
    <div class="form-group col-md-6" style="padding-left:30px">
        <label>วันสิ้นสุด</label>
        <input id="startdate" type="date" class="form-control">
    </div>

  </div>
</div>
<script type="text/javascript">
  $(function(){
    document.getElementById("startdate").value="2018-01-17";
  });
</script>
