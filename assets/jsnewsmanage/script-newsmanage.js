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
                  // console.log(editor.config);
                  myEditor = editor;
         })
         .catch( error => {
            console.error( error );
         });

$("form").submit( function(e) {
console.log(myEditor.getData());
      var messageLength = myEditor.getData().replace(/<[^>]*>/gi, '').replace('&nbsp;', '').replace('Enter text here!', '').length;
      if( !messageLength ) {
          alert( 'Please enter a message in content box' );
          e.preventDefault();
      }
  });

function functionName() {
  console.log(myEditor.getData());
}

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
