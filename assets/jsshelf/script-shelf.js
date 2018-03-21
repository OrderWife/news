// <script>
// var response = [1,2,3,4,5]
function createViewFile(res) {
  try {
    $.each(res, function(i, item) {
      // console.log(item);
      if(item['fn'] == '.'){ //|| item['fn'] == '..'
        return;
      }
        if (item['fn'] == '..' && upPath != 'f') {
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/up/'+upPath+'/."><i class="fa fa-home fa-fw"></i></a> '),
              $('<td>').html(''),
              $('<td>').text(''),
              $('<td>').text(''),
              $('<td class="center">').text('-'),
              $('<td align="right" >').html(''),
              ).appendTo('#dataTables-file');
        }
        // console.log(OrigName);
        if (OrigName[i]==null) {
          return;
        }
        if (item['fn'] == '..'){
          return;
        }
        var isHide = '';
        var shareBy = '';
        // console.log(pid);
        if(pid!=OrigName[i][3] && (OrigName[i][4] == 'm')){
          // Don't see file if not owner of file.
          return;
        }else if(pid!=OrigName[i][3] && OrigName[i][4] == 'g'){
          // Can see if owner of a file share to user.
          isHide = 'hide';
          //Share by.
          shareBy = "<font color="+'green'+"> ถูกแชร์โดย คุณ  "+OrigName[i][5]+" : "+ OrigName[i][6] +"</font>";
        }else if( pid!=OrigName[i][3] ){
          var out = false;
          guest = OrigName[i][4].split(',');
          for (var c = 0; c < guest.length; c++) {
            if(pid != guest[c]){
              out = true;
            }else{
              out = false;
              isHide = 'hide';
              shareBy = "<font color="+'green'+"> ถูกแชร์โดย คุณ  "+OrigName[i][5]+" : "+ OrigName[i][6] +"</font>";
              break;
            }
          }
          if (out) { //ถ้าไม่ได้ถูกแชร์จะไม่สามารถมองเห็นไฟล์ได้
            return;
          }
        }
        // var isHide = '';
        // if(pid!=OrigName[i][3]){
        // isHide = 'hide';
        //   // console.log('hide '+ item['fn']);
        // }
        // console.log(item['fn']);
        // var strBtnC= '<button title="Copy" type="button" class="btn btn-info" name="button" onclick="copy()" ><i class="fa fa-copy"></i></button> ';
        // var strBtnM= '<button title="Move" type="button" class="btn btn-warning" name="button" onclick="move()" ><i class="fa fa-arrows"></i></button> ';
        var strBtnD = '<button title="Delete" type="button" class="btn btn-danger '+isHide+' " name="button" onclick="FMdel('+"'"+strPath+"/"+item['fn']+"'"+')"><i class="fa fa-trash"></i></button> ';
        var strBtnR = '<button title="Rename" type="button" class="btn btn-warning '+isHide+' " name="button" onclick="rename('+"'"+item['fn']+"'"+','+"'"+OrigName[i][0]+"'"+','+"'"+strPath+"'"+')"><i class="fa fa-edit"></i></button> ';
        var strBtnS = '<button title="Share" type="button" class="btn btn-primary '+isHide+' " name="button" onclick="share('+"'"+item['fn']+"'"+')"><i class="fa fa-share"></i></button> ';
        // var strBTN = strBtnC + strBtnM + strBtnD;
        // var strBTN = strBtnC + strBtnD;
        var strBTN = strBtnS+strBtnR+strBtnD ;
        var parts = getExtension(item['fn']);
        // console.log(parts);
        if(isImage(parts))
        {
          var $tr = $('<tr>').append(
              // $('<td>').html('<a href="Myshelf/'+ path + item['fn'] + '" target="_blank"><i class="fa fa-file-image-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br>  <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/viewimg/'+ strPath+'/' + item['fn'] + '" target="_blank"><i class="fa fa-file-image-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br>  <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Image '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDoc(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-word-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Word, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDocEx(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-excel-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Excel, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDocPp(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-powerpoint-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Powerpoint, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isZip(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-archive-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Archive, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isTxt(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-text-o fa-fw"></i>'+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Text, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isPdf(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-pdf-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+strPath  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Portable Document Format, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else{ //if(item['fn'] != '..' && item['fn'] != '.')
          // var strPath = '<?php echo str_replace('=','',base64_encode($basePath."/")) ;?>';
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/folder/'+ strPath+'/'+item['fn']+'"><i class="fa fa-folder-o fa-fw"></i>'+ OrigName[i][0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html(' '),
              $('<td>').text(OrigName[i][1]),
              $('<td>').text('Folder'),
              $('<td class="center">').text("-"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }
      });
  } catch (e) {
    return;
  }
}


function createShareFile(res,response) {
  // try {
    $.each(res, function(i, item) {
        var ifExist = false;
        $.each(response, function(index, el) {
          if (item['fn'] == el['fn']) {
            ifExist = true;
            return;
          }
        });
        if (ifExist) {
          return;
        }
        // console.log('halo');
        var isHide = '';
        var shareBy= '';
        if(pid!=item['owner'] && (item['visit'] == 'm')){
          // Don't see file if not owner of file.
          return;
        }else if(pid!=item['owner'] && (item['visit']  == 'g')){
          // Can see if owner of file share.
          isHide = 'hide';
          shareBy = "<font color="+'green'+"> ถูกแชร์โดย คุณ  "+item['ower_n']+" : "+ item['group'] +"</font>";
        }else if( pid!=item['owner'] ){
          var out = false;
          guest = item['visit'].split(',');
          for (var c = 0; c < guest.length; c++) {
            // console.log( item['fn_o'] + pid +" " +guest[c] + (pid == guest[c]));
            if(pid != guest[c]){
              out = true;
              // isHide = 'hide';
            }else{
              out = false;
              isHide = 'hide';
              shareBy = "<font color="+'green'+"> ถูกแชร์โดย คุณ  "+item['ower_n']+" : "+ item['group'] +"</font>";
              break;
            }
          }
          if (out) { //ถ้าไม่ได้ถูกแชร์จะไม่สามารถมองเห็นไฟล์ได้
            return;
          }
        }
        // console.log(i + " : " + isHide);
        // var isHide = '';
        // if(pid!=OrigName[i][3]){
        // isHide = 'hide';
        //   // console.log('hide '+ item['fn']);
        // }
        // console.log(item['fn']);
        // var strBtnC= '<button title="Copy" type="button" class="btn btn-info" name="button" onclick="copy()" ><i class="fa fa-copy"></i></button> ';
        // var strBtnM= '<button title="Move" type="button" class="btn btn-warning" name="button" onclick="move()" ><i class="fa fa-arrows"></i></button> ';
        var strBtnD = '<button title="Delete" type="button" class="btn btn-danger '+isHide+' " name="button" onclick="FMdel('+"'"+item['path']+"/"+item['fn']+"'"+')"><i class="fa fa-trash"></i></button> ';
        var strBtnR = '<button title="Rename" type="button" class="btn btn-warning '+isHide+' " name="button" onclick="rename('+"'"+item['fn']+"'"+','+"'"+item['fn_o']+"'"+','+"'"+item['path']+"'"+')"><i class="fa fa-edit"></i></button> ';
        var strBtnS = '<button title="Share" type="button" class="btn btn-primary '+isHide+' " name="button" onclick="share('+"'"+item['fn']+"'"+')"><i class="fa fa-share"></i></button> ';
        // var strBTN = strBtnC + strBtnM + strBtnD;
        // var strBTN = strBtnC + strBtnD;
        var strBTN = strBtnS+strBtnR+strBtnD ;
        var parts = getExtension(item['fn']);
        // console.log(parts);
        if(isImage(parts))
        {
          var $tr = $('<tr>').append(
              // $('<td>').html('<a href="Myshelf/'+ path + item['fn'] + '" target="_blank"><i class="fa fa-file-image-o fa-fw"></i> '+ OrigName[i][0].split(".")[0]+'</a><br>  <p style="margin:0px;font-size:12px;">'+(OrigName[i][2] !== null ? OrigName[i][2]:'')+'</p>'),
              $('<td>').html('<a href="Myshelf/viewimg/'+ item['path'] +'/' + item['fn'] + '" target="_blank"><i class="fa fa-file-image-o fa-fw"></i> '+ item['fn_o'].split(".")[0]+ '</a><br><p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+ item['path'] +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Image '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDoc(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-word-o fa-fw"></i> '+ item['fn_o'].split(".")[0]+ '</a><br> <p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Word, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDocEx(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-excel-o fa-fw"></i> '+ item['fn_o'].split(".")[0]+ '</a><br> <p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Excel, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isDocPp(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-powerpoint-o fa-fw"></i> '+ item['fn_o'].split(".")[0]+ '</a><br> <p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Powerpoint, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isZip(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-archive-o fa-fw"></i> '+ item['fn_o'].split(".")[0]+ '</a><br> <p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Archive, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isTxt(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-text-o fa-fw"></i>'+ item['fn_o'].split(".")[0]+'</a><br> <p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Text, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else if(isPdf(parts)){
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '" target="_blank"><i class="fa fa-file-pdf-o fa-fw"></i> '+ item['fn_o'].split(".")[0]+ '</a><br> <p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html('<a href="Myshelf/download/'+item['path']  +'/'+ item['fn'] + '"><i class="fa fa-download fa-fw"></i></a>'),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Portable Document Format, '+ parts),
              $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }else{ //if(item['fn'] != '..' && item['fn'] != '.')
          // var strPath = '<?php echo str_replace('=','',base64_encode($basePath."/")) ;?>';
          var $tr = $('<tr>').append(
              $('<td>').html('<a href="Myshelf/folder/'+ item['path']+'/'+item['fn']+'"><i class="fa fa-folder-o fa-fw"></i>'+ item['fn_o'] + '</a><br> <p style="margin:0px;font-size:12px;">'+(item['describe'] !== null ? item['describe']:'')+'</p><p font-size:10px;>'+shareBy+'</p>'),
              $('<td>').html(' '),
              $('<td>').text(item['upload_date']),
              $('<td>').text('Folder'),
              // $('<td class="center">').text((item['fz']/1000000).toFixed(2)+" "+" mb"),
              $('<td class="center">').text("-"),
              $('<td align="right" >').html(strBTN),
              ).appendTo('#dataTables-file');
        }
      });
  // } catch (e) {
  //   console.log(e);
  //   return;
  // }
}

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
                  selector: 'td:nth-child(0)'
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
