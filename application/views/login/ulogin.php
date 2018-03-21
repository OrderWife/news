<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login</title>

        <?php $this->load->view('backendview/include/include_v.php'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">ลงชื่อเข้าใช้งานระบบ</h3>
                        </div>
                        <div class="panel-body">
                            <form action="checklogin" method="post">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="ชื่อผู้ใช้" name="username" type="username" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="รหัสผ่าน" name="password" type="password">
                                    </div>
                                    <!-- <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div> -->
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">เข้าสู่ระบบ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../../assets/startmin-master/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/startmin-master/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../assets/startmin-master/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../assets/startmin-master/js/startmin.js"></script>

    </body>
</html>
