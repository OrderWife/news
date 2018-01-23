<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>
<form class=""  method="post" enctype="multipart/form-data">
  <input type="file"  name="userfile[]" size="10000" accept=".pdf, .zip, .rar" multiple/>

  <br /><br />

  <input type="submit" value="upload" />
</form>


</form>

</body>
</html>
