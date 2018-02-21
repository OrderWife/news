<?php $this->load->view('backendview/include/include_tableFile'); ?>
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
<h1 class="page-header ">จัดการเอกสาร</h1>
<!-- data Table -->
<ol class="hide breadcrumb">
  <li class="breadcrumb-item"><a href="index.php/Myshelf">Root</a></li>
  <!-- <li class="breadcrumb-item">[ Folder Name 1 ]</li>
  <li class="breadcrumb-item">[ Folder Name 2 ]</li>
  <li class="breadcrumb-item active">[ Folder Name 3 ]</li> -->
</ol>

  <div class="panel panel-default">
    <div class="panel-heading hide " id="panel-header">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6" style="padding-left:0px;"> [User Name] </div>
        </div>
      </div>
    </div>
<!-- /.panel-heading -->
    <div class="panel-body" id="panel_body" style="padding:10px">
      <iframe class="" src="http://localhost/news/assets/angular-filemanager-bundle-php-local/shelf.php?root=<?php echo $root;?>"frameborder="0" scrolling="yes" width="100%" height="500px"></iframe>
      <div class="dataTable_wrapper hide">
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
                <!-- <tr class="">
                  <td> <a href="#"><i class="fa fa-folder-o fa-fw"></i> New Folder</a> </td>
                  <td></td>
                  <td>12/2/2561</td>
                  <td>Folder</td>
                  <td class="center">-</td>
                  <td align="right">
                    <button title="Copy" type="button" class="btn btn-info" name="button"  ><i class="fa fa-copy"></i></button>
                    <button title="Move" type="button" class="btn btn-warning" name="button"  ><i class="fa fa-arrows"></i></button>
                    <button title="Delete" type="button" class="btn btn-danger" name="button"  ><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <tr class="">
                  <td> <a href="#"><i class="fa fa-folder-o fa-fw"></i> New Folder</a> </td>
                  <td></td>
                  <td>12/2/2561</td>
                  <td>Folder</td>
                  <td class="center">-</td>
                  <td align="right">
                    <button title="Copy" type="button" class="btn btn-info" name="button"  ><i class="fa fa-copy"></i></button>
                    <button title="Move" type="button" class="btn btn-warning" name="button"  ><i class="fa fa-arrows"></i></button>
                    <button title="Delete" type="button" class="btn btn-danger" name="button"  ><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <tr class="">
                  <td> <a href="#"><i class="fa fa-folder-o fa-fw"></i> New Folder</a> </td>
                  <td></td>
                  <td>12/2/2561</td>
                  <td>Folder</td>
                  <td class="center">-</td>
                  <td align="right">
                    <button title="Copy" type="button" class="btn btn-info" name="button"  ><i class="fa fa-copy"></i></button>
                    <button title="Move" type="button" class="btn btn-warning" name="button"  ><i class="fa fa-arrows"></i></button>
                    <button title="Delete" type="button" class="btn btn-danger" name="button"  ><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                  <tr class="">
                    <td> <a href="#"><i class="fa fa-file-text-o fa-fw "></i> Internet Explorer 4.0.doc</a> </td>
                    <td><a href="#"><i class="fa fa-download fa-fw"></i></a></td>
                    <td>13/2/2561</td>
                    <td>Document</td>
                    <td class="center">3.12mb</td>
                    <td align="right">
                      <button title="Copy" type="button" class="btn btn-info" name="button"  ><i class="fa fa-copy"></i></button>
                      <button title="Move" type="button" class="btn btn-warning" name="button"  ><i class="fa fa-arrows"></i></button>
                      <button title="Delete" type="button" class="btn btn-danger" name="button"  ><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr class="">
                    <td> <a href="#"><i class="fa fa-file-text-o fa-fw "></i> Internet Explorer 5.0.doc</a> </td>
                    <td><a href="#"><i class="fa fa-download fa-fw"></i></a></td>
                    <td>13/2/2561</td>
                    <td>Document</td>
                    <td class="center">5.12mb</td>
                    <td align="right">
                      <button title="Copy" type="button" class="btn btn-info" name="button"  ><i class="fa fa-copy"></i></button>
                      <button title="Move" type="button" class="btn btn-warning" name="button"  ><i class="fa fa-arrows"></i></button>
                      <button title="Delete" type="button" class="btn btn-danger" name="button"  ><i class="fa fa-trash"></i></button>
                    </td>
                  </tr> -->
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

<script>
// var response = <?php //echo json_encode($query); ?>;
// var response = [1,2,3,4,5]
// $(function() {
//   try {
//     $.each(response, function(i, item) {
//         var strBtnC= '<button title="Copy" type="button" class="btn btn-info" name="button"  ><i class="fa fa-copy"></i></button> ';
//         var strBtnM= '<button title="Move" type="button" class="btn btn-warning" name="button"  ><i class="fa fa-arrows"></i></button> ';
//         var strBtnD= '<button title="Delete" type="button" class="btn btn-danger" name="button"  ><i class="fa fa-trash"></i></button> ';
//         var strBTN = strBtnC + strBtnM + strBtnD;
//         var $tr = $('<tr>').append(
//             $('<td>').html('<a href="#"><i class="fa fa-folder-o fa-fw"></i> '+"item.FILE_NAME"+'</a> '),
//             $('<td>').html('<a href="#"><i class="fa fa-download fa-fw"></i></a>'),
//             $('<td>').text('12/2/2561'),
//             $('<td>').text('Folder'),
//             $('<td class="center">').text('-'),
//             $('<td align="right" >').html(strBTN),
//             ).appendTo('#dataTables-file');
//     });
//   } catch (e) {
//     return;
//   }
// });
//
//
//   $(document).ready(function() {
//       $('#dataTables-file').DataTable({
//               responsive: true,
//               "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
//               "columnDefs": [{
//                               "targets": [1,5],
//                               "orderable": false
//                             }]
//             });
//           });


</script>
