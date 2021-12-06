<?php
session_start();
require_once '../../util/dbConnect.php';
require_once '../../util/checkUserUtil.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | VinaEnter Edu</title>
    <base href="http://localhost:8080/bstory/">
    <!-- BOOTSTRAP STYLES-->
    <link href="templates/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="templates/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="templates/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- JQUERY SCRIPTS -->
    <script src="templates/admin/assets/js/jquery_1.10.2.js"></script>
    <script src="library/ckeditor/ckeditor.js"></script>
    <script src="library/ckfinder/ckfinder.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/bstory/admin/index.php">VinaEnter Edu</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Xin chào, <b>Admin</b> &nbsp; <a href="/bstory/admin/auth/login.php" class="btn btn-danger square-btn-adjust">Đăng xuất</a> </div>
        </nav>
        <!-- /. NAV TOP  -->