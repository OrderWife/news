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


<div id="UploadModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span id='closeUp' class="close">&times;</span>
        <h3>Upload</h3>
      </div>
      <div class="modal-body">
        <!-- <p>Upload...</p> -->
        <div style="margin:10px" class="">
          <form class="" action="myshelf/upload/" enctype="multipart/form-data" method="post">
            <input class="form-control" id="file" type="file" name="file" accept=".pdf, .zip, image/*" required>
            <!-- <div class="file-loading">
                <label>Preview File</label>
                <input id="file" type="file" name="file[]" accept=".pdf, .zip, image/*" required>
            </div> -->
            <br>
            <label>คำอธิบาย</label>
            <input class="form-control" type="text" name="describe" placeholder="คำอธิบายไฟล์">
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
                <input required id="title" title='ชื่อโฟลเดอร์' class="form-control" type="text" name="folderName" placeholder="กรุณากรอกชื่อโฟลเดอร์">
                <br>
                <label>คำอธิบายไฟล์</label>
                <input class="form-control" type="text" name="describe" placeholder="คำอธิบายไฟล์">
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


<script>
// Get the modal
var UploadModal = document.getElementById('UploadModal');
var CreateFolderModal = document.getElementById('CreateFolderModal');
var CopyModal = document.getElementById('CopyModal');
var MoveModal = document.getElementById('MoveModal');

// Get the button that opens the modal
var uploadBtn = document.getElementById("uploadBtn");
var createFolderBtn = document.getElementById("createFolder");
// var copyBtn = document.getElementById("copyBtn");

// Get the <span> element that closes the modal
var closeUp = document.getElementById("closeUp");
var folderX = document.getElementById("folderX");
var CopyX = document.getElementById("CopyX");
var moveX = document.getElementById("moveX");

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

function move() {
  // console.log('click');
   MoveModal.style.display = "block";
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

moveX.onclick = function() {
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
</script>
