<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

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
                        <div class="col-lg-12">
                            <h1 class="page-header">Update News</h1>
                            <!-- data Table -->
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                DataTables Advanced Tables
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                      <div class="row">
                                            <div class="col-sm-12">
                                              <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 99px;">Rendering engine</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 122px;">Browser</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 110px;">Platform(s)</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 85px;">Engine version</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 62px;">CSS grade</th></tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.5</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 3.0</td>
                                                <td>Win 2k+ / OSX.3+</td>
                                                <td class="center">1.9</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.0</td>
                                                <td>OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.5</td>
                                                <td>OSX.3+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape 7.2</td>
                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Browser 8</td>
                                                <td>Win 98SE+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Navigator 9</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Mozilla 1.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td class="center">1</td>
                                                <td class="center">A</td>
                                            </tr>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.5</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 3.0</td>
                                                <td>Win 2k+ / OSX.3+</td>
                                                <td class="center">1.9</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.0</td>
                                                <td>OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.5</td>
                                                <td>OSX.3+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape 7.2</td>
                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Browser 8</td>
                                                <td>Win 98SE+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Navigator 9</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Mozilla 1.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td class="center">1</td>
                                                <td class="center">A</td>
                                            </tr>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.5</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 3.0</td>
                                                <td>Win 2k+ / OSX.3+</td>
                                                <td class="center">1.9</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.0</td>
                                                <td>OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.5</td>
                                                <td>OSX.3+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape 7.2</td>
                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Browser 8</td>
                                                <td>Win 98SE+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Navigator 9</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Mozilla 1.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td class="center">1</td>
                                                <td class="center">A</td>
                                            </tr>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.5</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 3.0</td>
                                                <td>Win 2k+ / OSX.3+</td>
                                                <td class="center">1.9</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.0</td>
                                                <td>OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.5</td>
                                                <td>OSX.3+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape 7.2</td>
                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Browser 8</td>
                                                <td>Win 98SE+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Navigator 9</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Mozilla 1.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td class="center">1</td>
                                                <td class="center">A</td>
                                            </tr>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 1.5</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Firefox 3.0</td>
                                                <td>Win 2k+ / OSX.3+</td>
                                                <td class="center">1.9</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.0</td>
                                                <td>OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Camino 1.5</td>
                                                <td>OSX.3+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape 7.2</td>
                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Browser 8</td>
                                                <td>Win 98SE+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA odd" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Netscape Navigator 9</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.8</td>
                                                <td class="center">A</td>
                                            </tr><tr class="gradeA even" role="row">
                                                <td class="sorting_1">Gecko</td>
                                                <td>Mozilla 1.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td class="center">1</td>
                                                <td class="center">A</td>
                                            </tr>
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
