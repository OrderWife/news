<?php $this->load->view('backendview/include/include_tableFile');?>
<base href="<?php echo base_url();?>" > <!--target="_blank"-->
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
<h2 class="page-header">จัดการเอกสาร</h2>
<!-- data Table -->
<!-- <ol id="breadPath" class="breadcrumb"> -->
  <!-- <li class="breadcrumb-item"><a href="./Myshelf">Root</a></li> -->
  <!-- <li class="breadcrumb-item"><a href="#">[ Folder Name 1 ]</a></li> -->
  <!-- <li class="breadcrumb-item"><a href="#">[ Folder Name 2 ]</a></li> -->
  <!-- <li class="breadcrumb-item active">[ Folder Name 3 ]</li> -->
<!-- </ol> -->

  <div class="panel panel-default">
    <div class="panel-heading" id="panel-header">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6" style="padding-left:0px;"> <?php if(isset($user,$gid)){echo $user . ' - ' .$gname;}else{ echo "[ User name ] - [Group Name]";} ?></div>
          <div class="col-md-6">
            <div class="row" style="float:right">
              <button id='createFolder' title="Add Folder" type="button" class="btn btn-success" name="button"><i class="fa fa-plus"></i> <small> สร้างโฟล์เดอร์</small></button>
              <button id="uploadBtn" title="Upload" type="button" class="btn btn-info" name="button"><i class="fa fa-upload"></i> <small> อัพโหลดไฟล์</small></button>
              <!-- <button title="Share" type="button" class="btn btn-primary" name="button"><i class="fa fa-share"></i> <small>Share</small> </button> -->
            </div>
            <!-- <div class="row" style="float:right">
              <button title="Copy" type="button" class="btn btn-info" name="button"  ><i class="fa fa-copy"></i></button>
              <button title="Move" type="button" class="btn btn-warning" name="button"  ><i class="fa fa-arrows"></i></button>
              <button title="Delete" type="button" class="btn btn-danger" name="button"  ><i class="fa fa-trash"></i></button>
            </div> -->
          </div>
        </div>
      </div>
    </div>
<!-- /.panel-heading -->
    <div class="panel-body" id="panel_body">
      <div class="dataTable_wrapper">
          <table class="table" id="dataTables-file">
              <thead>
                  <tr>
                      <th>ชื่อไฟล์</th>
                      <th style="width: 5px;"></th>
                      <th>อัพโหลดวันที่</th>
                      <th>ชนิด</th>
                      <th>ขนาด</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                <!-- files list -->
              </tbody>
              <tfoot>
                <tr>
                  <th>ชื่อไฟล์</th>
                  <th></th>
                  <th>อัพโหลดวันที่</th>
                  <th>ชนิด</th>
                  <th>ขนาด</th>
                  <th></th>
                </tr>
              </tfoot>
          </table>
      </div>
    </div>
<!-- /.panel-body -->
</div>
<script type="text/javascript">
  var response = <?php echo $files; ?>;
  var strPath = '<?php echo str_replace('=','',base64_encode($basePath)) ;?>';
  var path = "<?php echo str_replace('news/','',$basePath); ?>";
  var upPath = '<?php echo $upPath; ?>';
  var OrigName = <?php echo $filesOrig; ?>;
  var pid = '<?php echo $id;?>';
  function FMdel(ggg) {
          // console.log(ggg);
             var link = "<?php echo base_url().'index.php/myshelf/deleteFile/';?>"+ggg;
                swal({
                  title: "ลบไฟล์!",
                  text: "คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?",
                  icon: "warning",
                  // buttons: true,
                  buttons: ["ไม่!", "ใช่!"],
                  dangerMode: true,
                }).then((willDelete) => {
                if (willDelete) {
                  if (willDelete) {
                    // $.post('link').then
                    swal("Poof! ลบไฟล์เรียบร้อยแล้ว!", {
                      icon: "success",
                    }).then(function(){
                        // window.location = "<?php //echo base_url(). 'index.php/myshelf/deleteFile/'?>"+a;
                        window.location = link;
                      });
                    }
                } else {
                  swal("ไฟล์ของคุณยังปลอดภัยดี !");
                }
              });

          };

</script>
<script src="../assets/jsshelf/script-shelf.js" type="text/javascript"></script>
<?php $this->load->view('myshelf/include/modal.php');  ?>
