<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Edit Cat | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa Danh Mục</h2>
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
                                $cat_id = $_GET['cat_id'];
                                $select = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
                                if ($mysqli->query($select)) {
                                    $infoCat = mysqli_fetch_assoc($mysqli->query($select));
                                }




                                //UPDATE
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['name']) {
                                        $name = $_POST['name'];
                                    } else {
                                        $error['name'] = "chưa nhập tên danh mục";
                                    }
                                    if (empty($error)) {
                                        //B2: Viết câu lệnh truy vấn
                                        $query = "UPDATE cat SET name='{$name}' WHERE cat_id = {$cat_id}";
                                        //B3: thêm dữ liệu vào database
                                        $result = $mysqli->query($query);
                                        //B4: thông báo kết quả
                                        if ($result) {
                                            header("LOCATION:index.php?msg= Cập nhật danh mục thành công!");
                                        } else {
                                            echo "Lỗi! Không thể cập nhật danh mục";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label>Tên Thể Loại:</label>
                                        <input type="text" name="name" value="<?php echo $infoCat['name'] ?>" class="form-control" />
                                        <?php echo isset($error['name']) ? $error['name'] : ''; ?>
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