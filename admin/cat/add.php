<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Add Cat | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm Danh Mục</h2>
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
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['name']) {
                                        $name = $_POST['name'];
                                    } else {
                                        $error['name'] = "chưa nhập tên danh mục";
                                    }
                                    if (empty($error)) {
                                        //B2: Viết câu lệnh truy vấn
                                        $query = "INSERT INTO `cat`(`name`) VALUES ('{$name}')";
                                        //B3: thêm dữ liệu vào database
                                        $result = $mysqli->query($query);
                                        //B4: thông báo kết quả
                                        if ($result) {
                                            header("LOCATION:index.php?msg= Thêm danh mục thành công!");
                                        } else {
                                            echo "Lỗi! Không thể thêm danh mục";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label>Tên Thể Loại:</label>
                                        <input type="text" name="name" class="form-control" />
                                        <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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