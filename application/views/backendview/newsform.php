<script src="<?php echo base_url();?>assets/plugins/ckeditor5-build-classic/ckeditor.js"></script>


<div class="col-md-12">
  <form class="" id="news">
    <div class="col-md-12" >
      <div class="col-md-5 col-md-offset-1">
          <div class="form-group">
            <label>หัวข้อ</label>
            <input required class="form-control" type="text" name="title" placeholder="กรุณากรอกชื่อหัวข้อข่าว">
          </div>
          <div class="form-group">
            <label>หมวดหมู่</label>
            <input required class="form-control" type="text" list="browsers" name="category" placeholder="กรุณาเลือกหมวดหมู่" >
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
              <input required id="startdate" name="startdate" type="date" class="form-control" readonly>
          </div>
          <div class="form-group col-md-6" >
              <label>วันสิ้นสุด</label>
              <input required id="enddate" type="date" name="enddate" min="<?php echo date("Y-m-d")?>" class="form-control" >
              <input type="checkbox" id="unlimit" value="unlimit">ไม่สิ้นสุด
          </div>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <div class="form-group">
            <label>ภาพ</label>
            <div id="showimg" style="background-color: lightgrey; width: 200px; height:200px;">
              <img style="float:center" id="blah" src="#" alt="your image" />
            </div><br>
            <input type="file" onchange="readURL(this);">
        </div>
      </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <div class="form-group" >
        <label><h4>เนื้อหา</h4></label>
        <font id="valid" class="hide" style="color:red">กรุณาเพิ่มเนื้อหา</font>
        <textarea name="content" id="editor">
        </textarea>
      </div>
      </div>
    </div>
    Select file: <input type="file" id="file" name="img" multiple onchange="updateList()">
    <br/>Selected files:
    <div id="fileList"></div>
    <button id="submidNews" type="submit" class="btn btn-success">Submit Button</button>
  </form>
</div>


<script type="text/javascript">
  ClassicEditor.create(document.querySelector( '#editor' ))
             .then( editor => {
                      //console.log( 'Editor was initialized', editor );
                      editor.setData('<p>Enter text here!</p>');
                      myEditor = editor;
             })
             .catch( error => {
                console.error( error );
             });


  $(function(){
    document.getElementById("startdate").value="<?php echo date("Y-m-d")?>";

  });
  $("form").submit( function(e) {
          var messageLength = myEditor.getData().replace(/<[^>]*>/gi, '').replace('&nbsp;', '').replace('Enter text here!', '').length;
          if( !messageLength ) {
              alert( 'Please enter a message in content box' );
              e.preventDefault();
          }
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
        if (input.files && input.files[0] && isImage(input.files[0].name)) {
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

    function getExtension(filename) {
          var parts = filename.split('.');
          return parts[parts.length - 1];
        }

        function isImage(filename) {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) {
        case 'jpg':
        case 'gif':
        case 'bmp':
        case 'png':
            //etc
            return true;
        }
        return false;
    }

    updateList = function() {
      var input = document.getElementById('file');
      var output = document.getElementById('fileList');

      output.innerHTML = '<ul>';
      for (var i = 0; i < input.files.length; ++i) {
        output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
      }
      output.innerHTML += '</ul>';
    }
    function updateList() {
    var input = document.getElementById('file');
    var output = document.getElementById('fileList');

    output.innerHTML = '<ul>';
    for (var i = 0; i < input.files.length; ++i) {
      output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML += '</ul>';
  }

</script>
