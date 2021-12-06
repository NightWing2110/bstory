<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Add User | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm Người Dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $username = $_POST['username'];
                                    $password = md5($_POST['password']);
                                    $fullname = $_POST['fullname'];
                                    $query = "SELECT * FROM users WHERE username = '$username'";
                                    $result = $mysqli->query($query);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "Trùng tên đăng nhập";
                                    } else {
                                        $query = "INSERT INTO users(username,password,fullname)
                                                VALUES ('{$username}', '{$password}','{$fullname}')";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            header("location:index.php?msg=Thêm thành công");
                                            die();
                                        } else {
                                            echo "Có lỗi khi thêm người dùng";
                                            die();
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" name="username" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" name="password" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Fullname:</label>
                                        <input type="text" name="fullname" class="form-control" required />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                </form>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once '../../admin/inc/footer.php' ?>