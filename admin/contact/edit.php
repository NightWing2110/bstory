<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Edit Contact | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa Liên Lạc</h2>
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
                                $contact_id = $_GET['contact_id'];
                                $select = "SELECT * FROM contact WHERE contact_id = {$contact_id}";
                                if ($mysqli->query($select)) {
                                    $infoContact = mysqli_fetch_assoc($mysqli->query($select));
                                }
                                //UPDATE
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['name']) {
                                        $name  = $_POST['name'];
                                    } else {
                                        $error['name'] = "Chưa nhập liên lạc";
                                    }
                                    if (empty($error)) {
                                        $query = "UPDATE contact SET name  = '{$name}' WHERE contact_id = {$contact_id}";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            header('location:index.php?msg= Cập nhật liên lạc thành công');
                                        } else {
                                            echo "lỗi";
                                        }
                                    }
                                }
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['email']) {
                                        $email  = $_POST['email'];
                                    } else {
                                        $error['email'] = "Chưa nhập liên lạc";
                                    }
                                    if (empty($error)) {
                                        $query = "UPDATE contact SET email  = '{$email}' WHERE contact_id = {$contact_id}";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            header('location:index.php?msg= Cập nhật liên lạc thành công');
                                        } else {
                                            echo "lỗi";
                                        }
                                    }
                                }
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['website']) {
                                        $website  = $_POST['website'];
                                    } else {
                                        $error['website'] = "Chưa nhập liên lạc";
                                    }
                                    if (empty($error)) {
                                        $query = "UPDATE contact SET website  = '{$website}' WHERE contact_id = {$contact_id}";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            header('location:index.php?msg= Cập nhật liên lạc thành công');
                                        } else {
                                            echo "lỗi";
                                        }
                                    }
                                }
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['content']) {
                                        $content  = $_POST['content'];
                                    } else {
                                        $error['content'] = "Chưa nhập liên lạc";
                                    }
                                    if (empty($error)) {
                                        $query = "UPDATE contact SET content  = '{$content}' WHERE contact_id = {$contact_id}";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            header('location:index.php?msg= Cập nhật liên lạc thành công');
                                        } else {
                                            echo "lỗi";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label>Tên Thể Loại:</label>
                                        <input type="text" name="name" value="<?php echo $infoContact['name'] ?>" class="form-control" />
                                        <?php echo isset($error['name']) ? $error['name'] : ''; ?>

                                        <label>Email:</label>
                                        <input type="text" name="email" value="<?php echo $infoContact['email'] ?>" class="form-control" />
                                        <?php echo isset($error['email']) ? $error['email'] : ''; ?>

                                        <label>Website:</label>
                                        <input type="text" name="website" value="<?php echo $infoContact['website'] ?>" class="form-control" />
                                        <?php echo isset($error['website']) ? $error['website'] : ''; ?>

                                        <label>Content:</label>
                                        <input type="text" name="content" value="<?php echo $infoContact['content'] ?>" class="form-control" />
                                        <?php echo isset($error['content']) ? $error['content'] : ''; ?>
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