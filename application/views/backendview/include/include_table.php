<!-- DataTables CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>assets/startmin-master/css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/startmin-master/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script type="text/javascript">

var response = <?php echo json_encode($query); ?>;
$(function() {
    $.each(response, function(i, item) {
        var $tr = $('<tr>').append(
            $('<td>').text(item.N_CATEGORY),
            $('<td>').text(item.N_TITLE),
            $('<td>').text(item.N_START_DATE),
            $('<td>').text(item.N_END_DATE),
            $('<td>').text(item.N_LAST_EDIT),
            $('<td align="center" >').html('<button type="button" style="float:center;" class="btn btn-warning btn-sm"><b class="fa fa-edit"></b></button> <button type="button" style="float:center;" class="btn btn-danger btn-sm"><b class="fa fa-remove"></b></button>'),
        ).appendTo('#dataTables-example');
    });
});
</script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>
