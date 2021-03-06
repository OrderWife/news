<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<?php $this->load->view('backendview/include/include_tableFile');?>
<style href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.dataTables.min.css" media="screen"></style>
<style href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" media="screen"></style>
<base href="<?php echo base_url();?>" > <!--target="_blank"-->
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
<h3 class="page-header">ระบบจัดการเอกสารอิเล็กทรอนิค สปสช. กทม. (I Shelf)</h3>
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
          <div class="col-md-6 col-sm-4" style="padding-left:0px;"> <?php if(isset($user,$gid)){echo $user . ' - ' .$gname;}else{ echo "[ User name ] - [Group Name]";} ?></div>
          <div class="col-md-6 col-sm-4">
            <div class="row" style="float:right">
              <button id='createFolder' title="Add Folder" type="button" class="btn btn-success" name="button"><i class="fa fa-plus"></i> <small> สร้างโฟล์เดอร์ใหม่</small></button>
              <button id="uploadBtn" title="Upload" type="button" class="btn btn-info" name="button"><i class="fa fa-upload"></i> <small> อัพโหลดเอกสาร</small></button>
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
          <table class="table"  id="dataTables-file">
              <thead>
                  <tr>
                      <th style="width: 40%;">ชื่อไฟล์</th>
                      <th style="width: 5px;"></th>
                      <th style="width: 15%;">อัพโหลดวันที่</th>
                      <th style="width: 15%;">ชนิด</th>
                      <th style="width: 10px;">ขนาด</th>
                      <th style="width: 15%;"></th>
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
  $(document).ready(function() {
    $('#panel_body').addClass('bgShelfimg');
    $('td').addClass('blockData');
    $('th').addClass('thFont');
  });

  var response = <?php echo $files; ?>;
  var strPath = '<?php echo str_replace('=','',base64_encode($basePath)) ;?>';
  // var path = "<?php //echo str_replace('news/','',$basePath); ?>";
  var upPath = '<?php echo $upPath; ?>';
  var OrigName = <?php echo $filesOrig; ?>;
  var pid = '<?php echo $id;?>';
  var getShare = <?php if(isset($getShare)){echo $getShare;}else{echo json_encode(array());}?>;
  function FMdel(ggg) {
          // console.log(ggg);
             var link = "<?php echo base_url().'myshelf/deleteFile/';?>"+ggg;
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
                        // window.location = "<?php //echo base_url(). 'myshelf/deleteFile/'?>"+a;
                        window.location = link;
                      });
                    }
                } else {
                  swal("ไฟล์ของคุณยังปลอดภัยดี !");
                }
              });

          };

</script>
<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="./assets/jsshelf/script-shelf.js" type="text/javascript"></script>

<script type="text/javascript">

createViewFile(response);
createShareFile(getShare,response);

</script>
<?php $this->load->view('myshelf/include/modal.php');  ?>
