<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password = md5($_POST['password']);
	// echo $password;
	$ret=mysqli_query($bd, "SELECT * FROM admin WHERE username='$username' and password='$password'");
	// $ret=mysqli_query($bd, "SELECT * FROM admin WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."'");
	$num=mysqli_fetch_array($ret);

	if($num>0)
	{
		// echo "Now second if";
		$extra="change-password.php";//
		$_SESSION['alogin']=$_POST['username'];
		$_SESSION['id']=$num['id'];
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		// header("location: /admin/notprocess-counsel.php");
		header("location: notprocess-counsel.php");
		exit();
	}else{
		// echo "Now second else";
		$_SESSION['errmsg']="Invalid username or password";
		$extra="index.php";
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .footer {
        margin-top: auto;
    }

    .navbar-bg {
        background-color: #ced6e0 !important;
    }

    .wrapper {
        padding-bottom: 16rem;
    }

    .card {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }
    </style>
</head>

<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner navbar-bg">
            <div class="container ">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>
                <a class="brand" href="../index.html">
                    Student Counsel | Admin
                </a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
                        <li>
                            <a href="../index.html">
                                Back to Portal
                            </a>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->



    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4 card">
                    <form class="form-vertical" method="post">
                        <div class="module-head">
                            <h3>Sign In</h3>
                        </div>
                        <span
                            style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" id="inputEmail" name="username"
                                        placeholder="Username">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" name="password"
                                        placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right"
                                        name="submit">Login</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/.wrapper-->

    <div class="footer align-right" style="background-color: #ced6e0; padding-bottom: 30px;">
        <div class="container">
            <b class="copyright">&copy; 2023 studentcounselling </b> All rights reserved.
        </div>
    </div>


    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>