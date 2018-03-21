
        var icon;
        $('.icp-dd').iconpicker({
                                icons: ['fa-folder','fa-folder-open','fa-address-book','fa-book','fa-briefcase','fa-suitcase',
                                'fa-trash','fa-trash-alt','fa-th','fa-images',"fa-archive",'fa-file','fa-sticky-note','fa-paste','fa-paperclip',
                                'fa-question-circle','fa-envelope','fa-thumbtack','fa-inbox','fa-paper-plane','fa-hdd','fa-server',
                                'fa-money-bill-alt','fa-user-md','fa-medkit','fa-cloud-download-alt','fa-user'],
                            });
        $('.icp').on('iconpickerSelected', function(e) {
                // console.log(e.iconpickerValue);
                if(e.iconpickerValue){
                  icon = e.iconpickerValue;
                }else{
                  console.log('null');
                }

              });
        function logcolor() {
          // console.log($('#colorPicker').val());
          var color = $('#colorPicker').val();
          $(".selected").children('div').children('div').children('span').css({'color': color});
          if (icon) {
            $(".selected").children('div').children('div').children('span').attr('class', 'fa sizeCustom '+icon);
          }
          $.ajax({
            url: './myshelf/changeIC',
            type: 'post',
            data: {
                  'icon': icon,
                  'color': color,
                  'refname' : $(".selected").data('realname'),
              },
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });


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
            var res = filename.match(/(txt|ini|csv|java|php|js|css|html)$/i);
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

        $('label.dot').dotdotdot({
            ellipsis: '...', /* The HTML to add as ellipsis. */
            wrap : 'children', /* How to cut off the text/html: 'word'/'letter'/'children' */
            truncate: "letter",
            watch : true, /* Whether to update the ellipsis: true/'window' */
            // tolerance: 3,  /* Deviation for the measured wrapper height. */
            height: null,
            // width:10,
        });

        $(function() {
          if (upPath != 'f') {
            $('#uploadBtn').removeAttr('disabled');
            var div = $('<div id="upPath" class="col-xs-12 col-md-2 simulate">').append(
              $('<div title="">').append('<div class=""><span class="fa sizeCustom fa-undo "></span></div>',
                $('<label class="">').html(".."),
                $('<label style="display:none">').text(".."),
              ),
            ).appendTo('#boxcontent');
            div.data('Type','upPath');
          }
        });

        $.each(OrigName, function(i, item) {
          if (item == null){
            return;
          }
          var owner = true;
          var iconShare ="";
          if(pid!=item[3] && (item[4] == 'm')){
            // Don't see file if not owner of file.
            return;
          }else if(pid!=item[3] && item[4] == 'g'){
            // Can see if owner of a file share to user.
            owner = false;
            iconShare = '<i class="fa fa-users fa-stack-2x calendar-text" style="color:#1258DC;"></i>';
          }else if( pid!=item[3] ){
            var out = false;
            guest = item[4].split(',');
            for (var c = 0; c < guest.length; c++) {
              if(pid != guest[c]){
                out = true;
                owner = false;
              }else{
                out = false;
                owner = false;
                iconShare = '<i class="fa fa-users fa-stack-2x calendar-text" style="color:#1258DC;"></i>';
                break;
              }
            }
            if (out) { //ถ้าไม่ได้ถูกแชร์จะไม่สามารถมองเห็นไฟล์ได้
              return;
            }
          }
          if(pid==item[3] && (item[4] != 'm')){
            iconShare = '<i class="fa fa-user-plus fa-stack-2x calendar-text" style="color:#009933;"></i>';
          }
          var folderIcon = item[8];
          var type = "[ folder ]";
          var typeofFiles = getExtension(item[7]);
          if(isDocEx(typeofFiles)){
            folderIcon = "fa-file-excel";
            type = "[Excel "+typeofFiles+"]";
          }else if(isDocPp(typeofFiles)){
            folderIcon = "fa-file-powerpoint";
            type = "[Powerpoint "+typeofFiles+"]";
          }else if(isZip(typeofFiles)){
            folderIcon = "fa-file-archive";
            type = "[Archive "+typeofFiles+"]";
          }else if(isTxt(typeofFiles)){
            folderIcon = "fa-file-alt";
            type = "[Text "+typeofFiles+"]";
          }else if(isMov(typeofFiles)){
            folderIcon = "fa-file-video";
            type = "[Video "+typeofFiles+"]";
          }else if(isPdf(typeofFiles)){
            folderIcon = "fa-file-pdf";
            type = "["+typeofFiles+"]";
          }else if(isImage(typeofFiles)){
            folderIcon = "fa-file-image";
            type = "[image "+typeofFiles+"]";
          }else if(isDoc(typeofFiles)){
            folderIcon = "fa-file-word";
            type = "[Word "+typeofFiles+"]";
          }
          // console.log(response[i]['fz']);
          var $div = $('<div class="col-xs-12 col-md-2 simulate">').append(
            $('<div title="'+item[0].split('.')[0]+'">').append('<div class=""><span style="color:'+item[9]+';" class="fa sizeCustom '+folderIcon+'"></span>'+iconShare+'</div>',
              $('<label class="dot">').html(item[0].split('.')[0]),
              $('<label style="display:none">').text(type),
            ),
          ).appendTo('#boxcontent');

          // console.log(owner && "คุณ" || item[5]);
          $div.data('owner',owner);
          $div.data('Name',item[0].split('.')[0]);
          $div.data('realname',item[7]);
          $div.data('Type',getExtension(item[7]));
          $div.data('OwnerFile', owner && "คุณ" || item[5]);
          $div.data('createDate',item[1]);
          $div.data('sizeFile',(getExtension(item[7])!="folder") && response[i]['fz'] || "-");
          // var ddddd = (getExtension(item[7])!="folder") && response[i]['fz'] || "-";
          // console.log(item[0].split('.')[0] +" FZ : "+ ddddd );
          $div.data('discribe',item[2] && item[2] || "-");

        });
        // console.log(getShare);
        $.each(getShare, function(i, item) {
          // console.log(item);
          if (item == null){
            return;
          }
          var owner = true;
          if(pid!=item['owner'] && (item['visit'] == 'm')){
            // Don't see file if not owner of file.
            return;
          }else if(pid!=item['owner'] && item['visit'] == 'g'){
            // Can see if owner of a file share to user.
            owner = false;
          }else if( pid!=item['owner'] ){
            var out = false;
            guest = item['visit'].split(',');
            for (var c = 0; c < guest.length; c++) {
              if(pid != guest[c]){
                out = true;
                owner = false;
              }else{
                out = false;
                owner = false;
                break;
              }
            }
            if (out) { //ถ้าไม่ได้ถูกแชร์จะไม่สามารถมองเห็นไฟล์ได้
              return;
            }
          }
          var folderIcon = item['icon'];
          var type = "[ folder ]";
          var typeofFiles = getExtension(item['fn']);
          if(isDocEx(typeofFiles)){
            folderIcon = "fa-file-excel";
            type = "[Excel "+typeofFiles+"]";
          }else if(isDocPp(typeofFiles)){
            folderIcon = "fa-file-powerpoint";
            type = "[Powerpoint "+typeofFiles+"]";
          }else if(isZip(typeofFiles)){
            folderIcon = "fa-file-archive";
            type = "[Archive "+typeofFiles+"]";
          }else if(isTxt(typeofFiles)){
            folderIcon = "fa-file-alt";
            type = "[Text "+typeofFiles+"]";
          }else if(isMov(typeofFiles)){
            folderIcon = "fa-file-video";
            type = "[Video "+typeofFiles+"]";
          }else if(isPdf(typeofFiles)){
            folderIcon = "fa-file-pdf";
            type = "["+typeofFiles+"]";
          }else if(isImage(typeofFiles)){
            folderIcon = "fa-file-image";
            type = "[image "+typeofFiles+"]";
          }else if(isDoc(typeofFiles)){
            folderIcon = "fa-file-word";
            type = "[Word "+typeofFiles+"]";
          }
          // console.log(response[i]['fz']);
          var $div = $('<div class="col-xs-12 col-md-2 simulate">').append(
            $('<div title="'+item['fn_o'].split('.')[0]+'">').append('<div class=""><span style="color:'+item['hex']+';" class="fa sizeCustom '+folderIcon+'"></span><i class="fa fa-users fa-stack-2x calendar-text" style="color:#1258DC;"></i></div>',
              $('<label class="dot">').html(item['fn_o'].split('.')[0]),
              $('<label style="display:none">').text(type),
            ),
          ).appendTo('#boxcontent');

          // console.log(owner && "คุณ" || item[5]);
          $div.data('owner',owner);
          $div.data('Name',item['fn_o'].split('.')[0]);
          $div.data('realname',item['fn']);
          $div.data('Type',getExtension(item['fn']));
          $div.data('OwnerFile', owner && "คุณ" || item['ower_n']);
          $div.data('createDate',item['upload_date']);
          $div.data('sizeFile',(getExtension(item['fn'])!="folder") && item['fz'] || "-");
          // var ddddd = (getExtension(item[7])!="folder") && response[i]['fz'] || "-";
          // console.log(item[0].split('.')[0] +" FZ : "+ ddddd );
          $div.data('discribe',item['describe'] && item['describe'] || "-");
          $div.data('path',item['path']);

        });


        function getExtension(filename) {
            var parts = filename.split('.');
            if(parts.length > 1){
              return parts[parts.length - 1];
            }else{
              return "folder"
            }

        }

        $( "#search" ).keyup(function() {
          // console.log(this.value);
          if (this.value) {
            $("div.simulate:contains('"+this.value+"')" ).css( "display", "" );
            $("div.simulate:not(:contains('"+this.value+"'))" ).css( "display", "none" );
          }else{
            $("div.simulate").css( "display", "" );
          }

        });


        $.expr[":"].contains = $.expr.createPseudo(function(arg) {
        return function( elem ) {
            return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });
