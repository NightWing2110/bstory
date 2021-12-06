<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Edit User | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa Thông Tin Người Dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                //SELECT
                                $id = $_GET['id'];
                                $select = "SELECT * FROM users WHERE id = {$id}";
                                if ($mysqli->query($select)) {
                                    $infoUser = mysqli_fetch_assoc($mysqli->query($select));
                                }




                                //UPDATE
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['username']) {
                                        $username = $_POST['username'];
                                    } else {
                                        $error['username'] = "chưa nhập tên danh mục";
                                    }
                                    if (empty($error)) {
                                        //B2: Viết câu lệnh truy vấn
                                        $query = "UPDATE users SET username='{$username}' WHERE id = {$id}";
                                        //B3: thêm dữ liệu vào database
                                        $result = $mysqli->query($query);
                                        //B4: thông báo kết quả
                                        if ($result) {
                                            header("LOCATION:index.php?msg= Cập nhật người dùng thành công!");
                                        } else {
                                            echo "Lỗi! Không thể cập nhật người dùng";
                                        }
                                    }
                                }
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['password']) {
                                        $password = md5($_POST['password']);
                                    } else {
                                        $error['password'] = "chưa nhập tên người dùng";
                                    }
                                    if (empty($error)) {
                                        //B2: Viết câu lệnh truy vấn
                                        $query = "UPDATE users SET password='{$password}' WHERE id = {$id}";
                                        //B3: thêm dữ liệu vào database
                                        $result = $mysqli->query($query);
                                        //B4: thông báo kết quả
                                        if ($result) {
                                            header("LOCATION:index.php?msg= Cập nhật người dùng thành công!");
                                        } else {
                                            echo "Lỗi! Không thể cập nhật người dùng";
                                        }
                                    }
                                }
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['fullname']) {
                                        $fullname = $_POST['fullname'];
                                    } else {
                                        $error['fullname'] = "chưa nhập tên người dùng";
                                    }
                                    if (empty($error)) {
                                        //B2: Viết câu lệnh truy vấn
                                        $query = "UPDATE users SET fullname='{$fullname}' WHERE id = {$id}";
                                        //B3: thêm dữ liệu vào database
                                        $result = $mysqli->query($query);
                                        //B4: thông báo kết quả
                                        if ($result) {
                                            header("LOCATION:index.php?msg= Cập nhật người dùng thành công!");
                                        } else {
                                            echo "Lỗi! Không thể cập nhật người dùng";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label>UserName:</label>
                                        <input type="text" name="username" value="<?php echo $infoUser['username'] ?>" class="form-control" />
                                        <?php echo isset($error['username']) ? $error['username'] : ''; ?>

                                        <label>Password:</label>
                                        <input type="password" name="password" value="<?php echo $infoUser['password'] ?>" class="form-control" />
                                        <?php echo isset($error['password']) ? $error['password'] : ''; ?>

                                        <label>FullName:</label>
                                        <input type="text" name="fullname" value="<?php echo $infoUser['fullname'] ?>" class="form-control" />
                                        <?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Cập Nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once '../../admin/inc/footer.php' ?>