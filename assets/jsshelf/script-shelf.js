// <script>
// var response = [1,2,3,4,5]
$(function() {
  try {
    $.each(response, function(i, item) {
      if(item == '.'){ //|| item == '..'
        return;
      }
        if (item == '..' && upPath != 'f') {
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/up/'+upPath+'/."><i class="fa fa-home fa-fw"></i></a> '),
              $('<td>').html(''),
              $('<td>').text(''),
              $('<td>').text(''),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(''),
              ).appendTo('#dataTables-file');
        }

        if (item == '..'){
          return;
        }
        var isHide = '';
        if(pid!=OrigName[i][3]){
        isHide = 'hide';
          // console.log('hide '+ item);
        }
        // console.log(item);
        // var strBtnC= '<button title="Copy" type="button" class="btn btn-info" name="button" onclick="copy()" ><i class="fa fa-copy"></i></button> ';
        // var strBtnM= '<button title="Move" type="button" class="btn btn-warning" name="button" onclick="move()" ><i class="fa fa-arrows"></i></button> ';
        var strBtnD = '<button title="Delete" type="button" class="btn btn-danger '+isHide+' " name="button" onclick="FMdel('+"'"+strPath+"/"+item+"'"+')"><i class="fa fa-trash"></i></button> ';
        var strBtnR = '<button title="Rename" type="button" class="btn btn-warning '+isHide+' " name="button" onclick="rename('+"'"+item+"'"+')"><i class="fa fa-edit"></i></button> ';
        // var strBTN = strBtnC + strBtnM + strBtnD;
        // var strBTN = strBtnC + strBtnD;
        var strBTN = strBtnR+strBtnD ;
        var parts = getExtension(item);
        // console.log(parts);
        if(isImage(parts))
        {
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="'+path + item + '" target="_blank"><i class="fa fa-file-image-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br>  <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath +'/'+ item + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Image '+ parts),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDoc(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="'+ path + item + '" target="_blank"><i class="fa fa-file-word-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Word, '+ parts),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDocEx(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="'+ path + item + '" target="_blank"><i class="fa fa-file-excel-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Excel, '+ parts),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDocPp(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="'+ path + item + '" target="_blank"><i class="fa fa-file-powerpoint-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Powerpoint, '+ parts),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isZip(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="'+ path + item + '" target="_blank"><i class="fa fa-file-archive-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Archive, '+ parts),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isTxt(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="' +path + item + '" target="_blank"><i class="fa fa-file-text-o fa-fw"></i>'+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Text, '+ parts),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isPdf(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="'+ path + item + '" target="_blank"><i class="fa fa-file-pdf-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</abbr></a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Portable Document Format, '+ parts),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(item != '..' && item != '.'){
          // var strPath = '<?php echo str_replace('=','',base64_encode($basePath."/")) ;?>';
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/folder/'+ strPath+'/'+item+'"><i class="fa fa-folder-o fa-fw"></i>'+ OrigName[i][0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html(' '),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Folder'),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }

      });

    ////////////////////////////////////////////////////////////////////////////////////////
      // var bredC =  <?php echo json_encode($picePath);?>;
//     var root ='';
//     var baseRoot;
//     $.each(bredC, function(c, path) {
//       if (c > 4) {
//         root
//
//       }else{
//         // console.log(path +" "+ c);
//         root += path+"/";
//         if (c==4) {
//           baseRoot = root;
//           var li = $('<li class="breadcrumb-item">').html('<a href="./Myshelf"> root </a>').appendTo('#breadPath');
//         }
//       }
//       // var li = $('<li class="breadcrumb-item">').html('<a href=""> PATH </a>').appendTo('#breadPath');
//
//     });
//     console.log(root);
  } catch (e) {
    return;
  }
});

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function isImage(filename) {
    switch (filename.toLowerCase()) {
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
        //etc
        return true;
    }
    return false;
}

function isDoc(filename) { //word
    var res = filename.match(/(doc|docx)$/i);
    if(res != null){
    	return true;
    }else{
    	return false;
    }
}

function isDocEx(filename) { //excel
    var res = filename.match(/(xls|xlsx)$/i);
    if(res != null){
    	return true;
    }else{
    	return false;
    }
}

function isDocPp(filename) { //powerpoint
    var res = filename.match(/(ppt|pptx)$/i);
    if(res != null){
    	return true;
    }else{
    	return false;
    }
}

function isZip(filename) { //Zip
    var res = filename.match(/(zip|rar|tar|gzip|gz|7z)$/i);
    if(res != null){
    	return true;
    }else{
    	return false;
    }
}

function isTxt(filename) { //Txt
    var res = filename.match(/(txt|ini|csv|java|php|js|css)$/i);
    if(res != null){
    	return true;
    }else{
    	return false;
    }
}

function isMov(filename) { //Mov
    var res = filename.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
    if(res != null){
    	return true;
    }else{
    	return false;
    }
}

function isPdf(filename) { //Pdf
    var res = filename.match(/(pdf)$/i);
    if(res != null){
    	return true;
    }else{
    	return false;
    }
}

  $(document).ready(function() {
      $('#dataTables-file').DataTable({
              rowReorder: {
                  selector: 'td:nth-child(2)'
              },
              responsive: true,
              // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
              "columnDefs": [{
                              "targets": [1,5],
                              "orderable": false
                            }]
            });
          });


// </script>