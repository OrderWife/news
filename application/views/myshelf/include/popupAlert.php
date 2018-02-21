<!-- jQuery -->
<script src="<?php echo base_url();?>assets/startmin-master/js/jquery.min.js"></script>
<!-- Sweetalert -->
<script src="<?php echo base_url()."assets/plugins/sweetalert/sweetalert.min.js"?>"></script>

<!-- Custom Fonts -->
<link href="<?php echo base_url();?>assets/startmin-master/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var fileExists = function() {
  swal({
    title: "ไฟล์ชื่อซ้ำ!",
    text: "คุณต้องไม่สามารถสร้างไฟล์ชื่อซ้ำกันได้",
    icon: "warning",
  }).then(function(){
      window.location = "<?php echo base_url(). 'index.php/myshelf/'?>";
    });
};


</script>
