<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Contact | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <?php
    $row_count = 4;
    $query1 = mysqli_query($mysqli, "SELECT * FROM story");
    $tongsodong = mysqli_num_rows($query1);
    $sotrang = ceil($tongsodong / $row_count);
    if (isset($_GET['page'])) {
        $curent_page = $_GET['page'];
    } else {
        $curent_page = 1;
    }
    $offset = ($curent_page - 1) * $row_count;
    ?>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản Lý Liên Lạc</h2>
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
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Content</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //b1 viết câu lệnh query lấy danh sách danh mục
                                    $query = "SELECT * FROM contact LIMIT $offset,$row_count";
                                    //b2 kết nối giữa php với sql để lấy dữ liệu
                                    $result = $mysqli->query($query);
                                    //b3 chuyển đổi dữ liệu để hiển thị
                                    while ($arContact = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="gradeX">
                                            <td><?php echo $arContact['contact_id'] ?></td>
                                            <td><?php echo $arContact['name'] ?></td>
                                            <td><?php echo $arContact['email'] ?></td>
                                            <td><?php echo $arContact['website'] ?></td>
                                            <td><?php echo $arContact['content'] ?></td>
                                            <td class="center">
                                                <a href="admin/contact/edit.php?contact_id=<?php echo $arContact['contact_id'] ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="admin/contact/del.php?contact_id=<?php echo $arContact['contact_id'] ?>" onclick="return confirm ('Bạn có thật sự muốn xóa danh mục này không?')" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của 24 truyện</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                            <?php
                                            for ($i = 1; $i <= $sotrang; $i++) {
                                                $active = '';
                                                if ($i == $curent_page) {
                                                    $active = 'active';
                                                }
                                            ?>
                                                <li class="paginate_button <?php echo $active ?>"><a href="/bstory/admin/contact/index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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