<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="<?php echo base_url();?>index.php/" target=""> <!--_blank-->
        <?php $this->load->view('backendview/include/include_v'); ?>
        <title>NHSO BACKEND</title>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="backend/"><b>NHSO</b> Dashboard</a>
                </div>
                <ul class="nav navbar-right navbar-top-links"> <!-- User bar -->
                    <li class="dropdown ">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>ชื่อ...... <b class="caret"></b>
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
                              <!-- active -->
                                <a class="" href="backend/home"><i class="fa fa-newspaper-o"></i> การจัดการข่าวสาร</a>
                            </li>
                            <li>
                                <a href="Myshelf"><i class="fa fa-book fa-fw"></i>Shelf Menu <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="Myshelf">My Shelf</a></li>
                                    <li><a href="#">_blank menu</a></li>
                                </ul>
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
                        <div class="col-md-12">
                            <?php
                            //$this->load->view('newsmanage\newsmanage');
                            if($page == 'news'){
                              $this->load->view('newsmanage\newsmanage');
                              //echo "News";
                            }else if($page == 'shelf'){
                              // echo "MyShelf";
                              $this->load->view('myshelf\homeshelf');
                            }
                            ?>
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
