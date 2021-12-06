<?php
session_start();
require_once "../util/dbConnect.php";
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
        <?php require_once 'inc/leftbar.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>TRANG QUẢN TRỊ VIÊN</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-green set-icon">
                                <i class="fa fa-bars"></i>
                            </span>
                            <div class="text-box">
                                <p class="main-text"><a href="/bstory/admin/cat/index.php" title="">Quản lý danh mục</a></p>
                                <?php
                                $queryCat = "SELECT * FROM cat";
                                $resultCat = $mysqli->query($queryCat);
                                $countCat = mysqli_num_rows($resultCat);
                                ?>
                                <p class="text-muted"><?php echo "Có " . $countCat . " Danh Mục" ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-blue set-icon">
                                <i class="fa fa-bell-o"></i>
                            </span>
                            <div class="text-box">
                                <p class="main-text"><a href="/bstory/admin/story/index.php" title="">Quản lý truyện</a></p>
                                <?php
                                $queryStory = "SELECT * FROM story";
                                $resultStory = $mysqli->query($queryStory);
                                $countStory = mysqli_num_rows($resultStory);
                                ?>
                                <p class="text-muted"><?php echo "Có " . $countStory . " Truyện" ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-brown set-icon">
                                <i class="fa fa-rocket"></i>
                            </span>
                            <div class="text-box">
                                <p class="main-text"><a href="/bstory/admin/user/index.php" title="">Quản lý người dùng</a></p>
                                <?php
                                $queryUser = "SELECT * FROM users";
                                $resultUser = $mysqli->query($queryUser);
                                $countUser = mysqli_num_rows($resultUser);
                                ?>
                                <p class="text-muted"><?php echo "Có " . $countUser . " Người Dùng"?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
        <?php require_once 'inc/footer.php'; ?>