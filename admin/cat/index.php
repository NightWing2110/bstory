<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Cat | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản Lý Danh Mục</h2>
                <!-- Hiển thị thông báo thêm thành công -->
                <?php
                if (isset($_GET['msg']) && $_GET['msg']) {
                    echo $_GET['msg'];
                }
                ?>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="admin/cat/add.php" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" name="timkiem" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['search'])) {
                                        $search = $_POST['timkiem'];
                                    } else {
                                        $search = '';
                                    }
                                    //b1 viết câu lệnh query lấy danh sách danh mục
                                    $query = "SELECT * FROM cat WHERE name LIKE '%$search%'";
                                    //b2 kết nối giữa php với sql để lấy dữ liệu
                                    $result = $mysqli->query($query);
                                    //b3 chuyển đổi dữ liệu để hiển thị
                                    while ($arCat = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="gradeX">
                                            <td><?php echo $arCat['cat_id'] ?></td>
                                            <td><?php echo $arCat['name'] ?></td>
                                            <td class="center">
                                                <a href="admin/cat/edit.php?cat_id=<?php echo $arCat['cat_id'] ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="admin/cat/del.php?cat_id=<?php echo $arCat['cat_id'] ?>" onclick="return confirm ('Bạn có thật sự muốn xóa danh mục này không?')" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php require_once '../../admin/inc/footer.php' ?>