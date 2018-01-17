<!-- DataTables CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>

<!-- <script type="text/javascript">

var response = [{"rank":"9","content":"Alon","UID":"5"},{"rank":"6","content":"Tala","UID":"6"}];
$(function() {
    $.each(response, function(i, item) {
        var $tr = $('<tr>').append(
            $('<td>').text(item.rank),
            $('<td>').text(item.content),
            $('<td>').text(item.UID)
        ).appendTo('#dataTables-example');
    });
});
</script> -->
