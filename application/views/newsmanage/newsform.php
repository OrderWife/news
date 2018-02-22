<script src="<?php echo base_url();?>assets/plugins/ckeditor5-build-classic/ckeditor.js"></script>
<link href="<?php echo base_url();?>assets/plugins/bootstrap/tag/dist/bootstrap-tagsinput.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="<?php echo base_url();?>assets/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/> -->
<link href="<?php echo base_url();?>assets/bootstrap-fileinput/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/themes/explorer-fa/theme.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/themes/fa/theme.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script> -->
<style>
.ck-editor{
    min-height: 300px;
}
</style>
<style>
.ck-editor__editable {
    min-height: 300px;
}
</style>
<div class="col-md-12">
  <!-- action="createnews"  -->
  <form action="" class="" id="news" enctype="multipart/form-data" method="post">
    <div class="row" >
      <div class="col-md-8">
          <div class="form-group">
            <label>หัวข้อ</label>
            <input required id="title" class="form-control" type="text" name="title" placeholder="กรุณากรอกชื่อหัวข้อข่าว">
          </div>
          <div class="form-group">
            <label>หมวดหมู่</label>
            <input required id="category" class="form-control" type="text" list="list_category" name="category" placeholder="กรุณาเลือกหมวดหมู่" >
            <datalist id="list_category">
              <option value="Internet Explorer">
              <option value="Firefox">
              <option value="Chrome">
              <option value="Opera">
              <option value="Safari">
            </datalist>
          </div>
          <div class="form-group">
            <label>Tag</label><br>
            <input type="text" id="tag" name="tagNews" value="" data-role="tagsinput">
          </div>
          <div class="form-group col-md-6" style="padding-left:0px">
              <label>วันเริ่มต้น</label>
              <input required id="startdate" name="startdate" type="date" class="form-control" readonly>
          </div>
          <div class="form-group col-md-6" style="padding-right:0px">
              <label>วันสิ้นสุด</label>
              <input required id="enddate" type="date" name="enddate" min="<?php echo date("Y-m-d")?>" max="<?php echo date('Y-m-d', strtotime('+5 years', strtotime(date("Y-m-d"))))?>" class="form-control" >
              <input type="checkbox" id="unlimit" value="unlimit">ไม่สิ้นสุด
          </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
            <label>ภาพ</label>
            <div id="showimg" class="hide"  style="background-color: lightgrey; width: 250px; height:200px; ">
            <img style="float:center" id="blah" src="#" alt="your image" />
            </div><br>
            <input class="btn btn-info btn-xs" id="inputImg" type="file" name="imgUp" accept=".jpg, .jpeg, .png, .gif, .bmp" onchange="readURL(this);"/>
        </div>
      </div>
    </div>
    <div class="">
      <label>เนื้อหาข่าว</label>
      <div class="ck-editor" >
        <font id="valid" class="hide" style="color:red">กรุณาเพิ่มเนื้อหา</font>
        <textarea name="content" id="editor"></textarea>
      </div>
      <br>
        <div id="uploadTips">
          <label>เอกสารแนบ</label>
          <div class="file-loading">
              <label>Preview File</label>
              <input id="file" type="file" name="fileUp[]" accept=".pdf, .zip" multiple>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <button id="submidNews"  type="submit" class="btn btn-success" style="float:right">บันทึก</button>
    </div>
  </form>
</div>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/tag/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/tag/dist/bootstrap-tagsinput-angular.min.js"></script>


<script type="text/javascript">
    document.getElementById("file").onchange = function(){
        var inputFiles = document.getElementById("file");
        if (inputFiles.files.length < 1) {
          return;
        }
        //console.log(inputFiles.files.length);
        if (inputFiles.files.length > 10) {
          swal({
            title: "คุณเลือกไฟล์นำเข้ามากเกินกว่าที่ระบบได้กำหนดไว้ !!",
            text: "คุณสามารถนำไฟล์เข้าสู่ระบบได้มากสุด 10 ไฟล์ !",
            icon: "warning",
            buttons: "เข้าใจแล้ว ^_^!",
          });
            inputFiles.value = null;
        }else{
          // var input = document.getElementById('file');
          // var output = document.getElementById('fileList');
          // document.getElementById('fileList').innerHTML = "";
          // //console.log(input.files);
          // //output.innerHTML = '<ul>';
          // //console.log(input.files.item(0));
          // for (var i = 0; i < input.files.length; ++i) {
          //   output.innerHTML += '<div class="alert alert-info">' + input.files.item(i).name +'  <button style="float:right" type="button" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button></div>';
          //
          // }
          // console.log(input.files);

          //output.innerHTML += '</ul>';
        }
    };


  ClassicEditor.create(document.querySelector( '#editor' )).then( editor => {
                      //console.log( 'Editor was initialized', editor );
                      editor.setData('<p>Enter text here!</p>');
                      console.log(editor.config);
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
              //console.log(e);
                $('#showimg').removeClass('hide');
                $('#blah')
                    .attr('src', e.target.result)
                    .width(250)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);

        }else if(input.files && input.files[0] && !isImage(input.files[0].name)) {
          alert("Please enter imamge file type (jpg, png, gif, bmp)");
          //input.value='';
          $('#showimg').addClass('hide');
          return;
        }

        if (input.files.length==0) {
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
    $("#file").fileinput({
        theme: 'fa',
        showUpload: false,
        showCaption: false,
        dropZoneEnabled: false,
        browseClass: "btn btn-primary",
        overwriteInitial: false,
        initialPreviewAsData: true,

    });

</script>