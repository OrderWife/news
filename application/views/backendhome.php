<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="<?php echo base_url();?>" target=""> <!--_blank-->
        <?php $this->load->view('backendview/include/include_v'); ?>
        <title>สปสช. กทม.</title>
        <style media="screen">
          .bgShelfimg {
              background-image: url('./assets/img/wallShelf.png');
              z-index: -1;
              /* display: block; */
              /* opacity: 0.5; */
              /* filter: alpha(opacity=20); */
                }
          .blockData{
              background-color: #FFF;
              /* opacity: 1; */
          }
          .thFont{
            color: #FFF;
          }
          .bgimg {
              /* background-image: url('./assets/img/nhso-bg.jpg'); */
              background-repeat: no-repeat;
              background-position: center;
              z-index: -1;
              position: center;
                }
          .ck-editor__editable{
            background-color: #FFF;
          }
          .navbar-inverse {
              background-color: #337ab7;
              border-color: #2b6aa0;
          }
          .navbar-top-links>li>a {
              color: #fff;
          }
          .navbar-inverse .navbar-brand {
              color: #ffffff;
          }
          .navbar-top-links>li>a:hover, .navbar-top-links>li>a:focus, .navbar-top-links>.open>a, .navbar-top-links>.open>a:hover, .navbar-top-links>.open>a:focus {
              color: #fff;
              background-color: #418fd2;
          }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a style="font-size:24px" class="navbar-brand" href="backend/"><b>สปสช.</b> กทม.</a>
                </div>
                <ul class="nav navbar-right navbar-top-links"> <!-- User bar -->
                    <li class="dropdown ">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php if(!isset($user)){ echo "username error"; }else{ echo $user; } ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user" style="padding-left: 10px;padding-right: 10px;">
                            <li style="text-align:center">คุณ <?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname') ?></li>
                            <li style="text-align:center"><?php echo $this->session->userdata('gname'); ?></li>
                            <li class="divider"></li>
                            <li><a href="login/logout"><i class="fa fa-sign-out fa-sign-out-alt"></i> Logout</a>
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
                                <a class="" href="backend/home"><i class="fa fa-newspaper-o"></i> ระบบจัดการข่าวสาร</a>
                            </li>
                            <li>
                                <a href="Myshelf"><i class="fa fa-book fa-fw"></i> ระบบจัดการเอกสารอิเล็กทรอนิค </a>
                            </li>
                            <!-- <li> -->
                                <!-- <a href="Myshelf/ang_fm"><i class="fa fa-book fa-fw"></i>Shelf-Angular-FM Menu </a> -->
                                <!-- <span class="fa arrow"></span> -->
                                <!-- <ul class="nav nav-second-level">
                                    <li><a href="Myshelf">My Shelf</a></li>
                                    <li><a href="#">_blank menu</a></li>
                                </ul> -->
                            <!-- </li> -->
                        </ul>

                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper" class="bgimg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if($page == 'news'){
                              $this->load->view('newsmanage/newsmanage');
                            }
                            else if($page == 'shelf'){
                              // $this->load->view('myshelf/homeshelf-bak-noIframe');
                              $this->load->view('myshelf/homeshelf-newversion-testing');
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
