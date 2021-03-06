<style>
/* body {font-family: Arial, Helvetica, sans-serif;} */

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 80%; /* Full width */
    height: 100%; /* Full height */
    margin-left: auto;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Header */
.modal-header {
    padding: 2px 16px;
    background-color: #5bc0de;
    color: white;
}

/* Modal Body */
.modal-body {padding: 2px 16px;}

/* Modal Footer */
.modal-footer {
    padding: 2px 16px;
    background-color: #8bcadd;
    color: white;
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<link href="<?php echo base_url();?>assets/plugins/bootstrap/tag/dist/bootstrap-tagsinput.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/> -->
<link href="<?php echo base_url();?>assets/bootstrap-fileinput/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/themes/explorer-fa/theme.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/bootstrap-fileinput/themes/fa/theme.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/tag/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/tag/dist/bootstrap-tagsinput-angular.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<div id="UploadModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span id='closeUp' class="close">&times;</span>
        <h3>Upload</h3>
      </div>
      <div class="modal-body">
        <!-- <p>Upload...</p> -->
        <div style="margin:10px" class="">
          <form class="" action="myshelf/upload/<?php echo str_replace('=','',base64_encode($basePath)) ;?>" enctype="multipart/form-data" method="post">
            <input class="form-control" id="file" type="file" name="file" accept=".pdf, .zip, image/*" required>
            <!-- <div class="file-loading">
                <label>Preview File</label>
                <input id="file" type="file" name="file[]" accept=".pdf, .zip, image/*" required>
            </div> -->
            <br>
            <label>คำอธิบาย</label>
            <input class="form-control"  maxlength="4000" type="text" name="describe" placeholder="คำอธิบายไฟล์">
            <br>
            <button style="float:right" type="submit" class="btn btn-success" name="button">อัพโหลดไฟล์</button>
            <br><br>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <h4>[Group Name]</h4>
      </div>
  </div>
</div>

<div id="CreateFolderModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span id="folderX" class="close">&times;</span>
        <h3>สร้างโฟลเดอร์ใหม่</h3>
      </div>
      <div class="modal-body">
        <div class="">
          <br>
          <form class="" action="myshelf/createFolder/<?php echo str_replace('=','',base64_encode($basePath).'/') ;?>" method="post">
                <label>ชื่อโฟลเดอร์</label>
                <input required id="title" title='ชื่อโฟลเดอร์' maxlength="4000" class="form-control" type="text" name="folderName" placeholder="กรุณากรอกชื่อโฟลเดอร์">
                <br>
                <label>คำอธิบายไฟล์</label>
                <input class="form-control" type="text"  maxlength="4000" name="describe" placeholder="คำอธิบายไฟล์">
                <br>
                <button style="float:right" type="submit" class="btn btn-success" name="button">สร้างโฟลเดอร์ใหม่</button>
                <br><br>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <h4>[Group Name]</h4>
      </div>
  </div>
</div>

<div id="RenameModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span id="renameX" class="close">&times;</span>
        <h3>เปลี่ยนชื่อไฟล์</h3>
      </div>
      <div class="modal-body">
        <div class="">
          <br>
          <form id="renameForm" class="" action="myshelf/rename" method="post">
                <label>ชื่อใหม่</label>
                <input required id="titlename" title='ชื่อโฟลเดอร์ใหม่' class="form-control" maxlength="4000" type="text" name="newName" placeholder="กรุณากรอกชื่อโฟลเดอร์">
                <br>
                <!-- <label>ชื่ออ้างอิง</label> -->
                <input readonly id="refname" title='ชื่ออ้างอิง' class="hide form-control" maxlength="4000" type="text" name="refName" value="">
                <input readonly id="basePath" title='ตำแหน่งไฟล์' class="hide form-control" maxlength="4000" type="text" name="basePath" value="">
                <!-- <br> -->
                <label>คำอธิบายไฟล์</label>
                <input class="form-control" type="text" name="describe" maxlength="4000" placeholder="คำอธิบายไฟล์">
                <br>
                <button style="float:right" type="submit" class="btn btn-success" name="button">ตกลง</button>
                <br><br>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <h4>[Group Name]</h4>
      </div>
  </div>
</div>

<div id="CopyModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span id="CopyX" class="close">&times;</span>
        <h3>คัดลอกไฟล์</h3>
      </div>
      <div class="modal-body">
        <div class="">
          <br>
          <form class="" action="myshelf/copyFile" method="post">
                <label>ชื่อไฟล์</label>
                <input required id="title" title='ชื่อโฟล์' class="form-control" type="text" name="title" placeholder="ชื่อไฟล์ใหม่">
                <br>
                <button style="float:right" type="submit" class="btn btn-info" name="button">Copy</button>
                <br><br>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <h4>[Group Name]</h4>
      </div>
  </div>
</div>

<div id="MoveModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span id="moveX" class="close">&times;</span>
        <h3>ย้ายไฟล์</h3>
      </div>
      <div class="modal-body">
        <div class="">
          <br>
          <form class="" action="myshelf/moveFile" method="post">
                <label>ชื่อไฟล์</label>
                <input required id="title" title='ชื่อโฟล์' class="form-control" type="text" name="title" placeholder="ชื่อไฟล์ใหม่">
                <br>
                <button style="float:right" type="submit" class="btn btn-warning" name="button">Move</button>
                <br><br>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <h4>[Group Name]</h4>
      </div>
  </div>
</div>

<div id="ShareModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span id="shareX" class="close">&times;</span>
        <h3>แชร์ ไฟล์/โฟล์เดอร์</h3>
      </div>
      <div class="modal-body">
        <div class="">
          <br>
          <form id="shareForm" class="" action="myshelf/share" method="post">
                <!-- <label>ชื่อไฟล์</label> -->
                <!-- <input disabled required id="title" title='ชื่อโฟล์' class="form-control" type="text" name="title" placeholder="ชื่อไฟล์ใหม่"> -->
                <input readonly id="refnameshare" title='ชื่ออ้างอิง' class="hide form-control" type="text" name="refnameshare" value="">

                <br>
                <div class="form-group">
                <label>เลือกรูปแบบการแชร์</label> <br>
                  <label class="radio-inline">
                      <input type="radio" name="RadioGroupShare" id="m" value="m" checked>เฉพาะฉันที่สามารถเห็นได้
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="RadioGroupShare" id="s" value="s">บางคนสามารถเห็นได้
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="RadioGroupShare" id="g" value="g" >ทุกคนในกลุ่มงานสามารถเห็นได้
                  </label>
                </div>
                <div id="findUser" class="hide">
                  <label for="">เลือกบุคคลที่ท่านต้องการแชร์ </label>
                  <div class="s2-example">
                    <p>
                      <select disabled required name="usershare[]" id="tag_user" class="js-example-basic-multiple form-control" multiple="multiple" style="width: 100%">
                      </select>
                    </p>
                  </div>

                </div>
                <!-- data-role="tagsinput" -->
                <br>
                <button style="float:right" type="submit" class="btn btn-info" name="button">ตกลง</button>
                <br><br>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <h4>[Group Name]</h4>
      </div>
  </div>
</div>


<script>
// Get the modal
var UploadModal = document.getElementById('UploadModal');
var CreateFolderModal = document.getElementById('CreateFolderModal');
var CopyModal = document.getElementById('CopyModal');
var MoveModal = document.getElementById('MoveModal');
var RenameModal = document.getElementById('RenameModal');
var ShareModal = document.getElementById('ShareModal');

// Get the button that opens the modal
var uploadBtn = document.getElementById("uploadBtn");
var createFolderBtn = document.getElementById("createFolder");
// var copyBtn = document.getElementById("copyBtn");

// Get the <span> element that closes the modal
var closeUp = document.getElementById("closeUp");
var folderX = document.getElementById("folderX");
var CopyX = document.getElementById("CopyX");
var moveX = document.getElementById("moveX");
var renameX = document.getElementById("renameX");
var shareX = document.getElementById("shareX");


// When the user clicks the button, open the modal
uploadBtn.onclick = function() {
    UploadModal.style.display = "block";
}
createFolderBtn.onclick = function() {

    CreateFolderModal.style.display = "block";
}

function copy() {
  // console.log('click');
   CopyModal.style.display = "block";
}
function rename(refName,basename,basepath) {
  // console.log('click');
   RenameModal.style.display = "block";
   // $('#renameForm').reset();
   $('#refname').val(refName);
   $('#basePath').val(basepath);
   $('#titlename').val(basename);
   // console.log($('#refname').val());
}
function move() {
  // console.log('click');
   MoveModal.style.display = "block";
}

function share(refName) {
  // console.log('click');
   ShareModal.style.display = "block";
   // $('#shareForm').reset();
   $('#refnameshare').val(refName);
}

// When the user clicks on <span> (x), close the modal
closeUp.onclick = function() {
    UploadModal.style.display = "none";
}
folderX.onclick = function() {
    CreateFolderModal.style.display = "none";
}
CopyX.onclick = function() {
    CopyModal.style.display = "none";
}
renameX.onclick = function() {
    RenameModal.style.display = "none";
}

moveX.onclick = function() {
    MoveModal.style.display = "none";
}

shareX.onclick = function() {
    MoveModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == UploadModal) {
        UploadModal.style.display = "none";
    }else if (event.target == CreateFolderModal) {
        CreateFolderModal.style.display = "none";
    }else if (event.target == CopyModal) {
        CopyModal.style.display = "none";
    }else if (event.target == MoveModal) {
        MoveModal.style.display = "none";
    }else if (event.target == RenameModal) {
        RenameModal.style.display = "none";
    }else if (event.target == ShareModal) {
        ShareModal.style.display = "none";
    }
}

// $("#file").fileinput({
//             theme: 'fa',
//             showUpload: false,
//             showCaption: true,
//             dropZoneEnabled: false,
//             browseClass: "btn btn-primary",
//             overwriteInitial: false,
//             initialPreviewAsData: false,
//         });
$('#m').change(function() {
      if ($('#m').prop("checked")) {
            // alert("M checked");
            $('#findUser').addClass('hide');
            $('#tag_user').prop('disabled', true);
      }
});
$('#s').change(function() {
      if ($('#s').prop("checked")) {
            // alert("S checked");
            $('#findUser').removeClass('hide');
            $('#tag_user').prop('disabled', false);
      }
});
$('#g').change(function() {
      if ($('#g').prop("checked")) {
            // alert("G checked");
            $('#findUser').addClass('hide');
            $('#tag_user').prop('disabled', true);
      }
});

$('#tag_user').select2({
    placeholder: 'เลือกผู้ใช้ที่ท่านต้องการแชร์',
});

var data = <?php echo $juser; ?>;
$.each(data,function(index, el) {
  // console.log(el);
  var newOption = new Option(el.NAME, el.ID, false, false);
  $('#tag_user').append(newOption).trigger('change');
});

</script>
