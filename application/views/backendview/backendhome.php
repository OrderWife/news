<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>NHSO BACKEND</title>

    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><b>NHSO</b> Dashboard</a>
                </div>
                <ul class="nav navbar-right navbar-top-links"> <!-- User bar -->
                    <li class="dropdown ">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>สิทธิโชค <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li class="divider"></li> -->
                            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation"> <!-- /.Side menu -->
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a class="active" href="#"><i class="fa fa-newspaper-o"></i> News Menu</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Shelf Menu<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Flot Charts</a>
                                    </li>
                                    <li>
                                        <a href="#">Morris.js Charts</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class=".col-xs-12 .col-md-8">
                            <h1 class="page-header">Update News
                              <button id="btn-yes-no" type="button" style="float:right;" class="btn btn-success btn-lg" onclick="showform()">Create News</button>
                            </h1>
                            <!-- data Table -->
                            <div class="panel panel-default">
                            <div class="panel-heading" id="panel-header">
                                DataTables Advanced Tables
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="panel_body">
                              <div class="" id="table_box"> <!--hide-->
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                      <div class="row">
                                         <div class=".col-xs-12 .col-md-8">
                                              <table class="table dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                                <thead>
                                                    <tr role="row">
                                                      <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 99px;">Catgory</th>
                                                      <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 80px;">Title</th>
                                                      <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">Start Date</th>
                                                      <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">End Date</th>
                                                      <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">Last Edit</th>
                                                      <th class="" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 90px;">Edit News</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <!-- /.table-responsive -->
                                <!-- footer table -->
                                <!-- <div class="well">
                                </div> -->
                                <!-- /.footer table -->
                              </div>
                              <div class="hide" id="form-box">
                                  <?php $this->load->view('backendview\newsform');?>
                              </div>

          <!-- Modal -->
          <!-- <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                      <?php //$this->load->view('backendview\newsform');?>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

              </div>

            </div>
          </div> -->
          <!-- /.Modal -->

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!--/.data table-->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
    </body>
</html>
<script type="text/javascript">
  function showform() {
    var boxTable = document.getElementById('table_box');
    var boxForm = document.getElementById('form-box');
    var box = document.getElementById('news');
    var btnYN = document.getElementById('btn-yes-no');
    var classN = boxTable.className;
    if(classN == 'hide' || btnYN.innerHTML == 'Cancel')
    {
      btnYN.className = 'btn btn-success btn-lg';
      btnYN.innerHTML = 'Create News'
      boxTable.className = '';
      $('#showimg').addClass('hide');
      box.reset();
      $('#tag').tagsinput('removeAll');
      boxForm.className  = 'hide';
    }else{
      btnYN.className = 'btn btn-danger btn-lg';
      btnYN.innerHTML = 'Cancel'
      boxTable.className = 'hide';
      boxForm.className  = '';
      document.getElementById("startdate").value="<?php echo date("Y-m-d")?>";

    }
  }
</script>
