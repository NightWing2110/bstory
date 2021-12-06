<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Story | VinaEnter Edu';
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
                <h2>Quản Lý Truyện</h2>
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
                                    <a href="admin/story/add.php" class="btn btn-success btn-md">Thêm</a>
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
                                        <th>Xem trước</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Lượt xem</th>
                                        <th>Ngày Viết</th>
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
                                    //trùng tên trường [story.*, cat.name as cat_name]
                                    $query = "SELECT story.*, cat.name AS cat_name FROM story 
                                                INNER JOIN cat 
                                                ON story.cat_id = cat.cat_id
                                                WHERE story.name LIKE '%$search%'
                                                ORDER BY story.story_id DESC
                                                LIMIT $offset, $row_count";
                                    //b2 kết nối giữa php với sql để lấy dữ liệu
                                    $result = $mysqli->query($query);
                                    //b3 chuyển đổi dữ liệu để hiển thị
                                    while ($arStory = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="gradeX">
                                            <td><?php echo $arStory['story_id'] ?></td>
                                            <td><?php echo $arStory['name'] ?></td>
                                            <td><?php echo $arStory['preview_text'] ?></td>
                                            <td><img src="files/uploads/<?php echo $arStory['picture'] ?>" alt="" width="250px"></td>
                                            <td><?php echo $arStory['cat_name'] ?></td>
                                            <td><?php echo $arStory['counter'] ?></td>
                                            <td><?php echo $arStory['created_at'] ?></td>
                                            <td class="center">
                                                <a href="admin/story/edit.php?story_id=<?php echo $arStory['story_id'] ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="admin/story/del.php?story_id=<?php echo $arStory['story_id'] ?>" onclick="return confirm('Bạn có thực sự muốn xóa truyện này không?')" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
                                                <li class="paginate_button <?php echo $active ?>"><a href="/bstory/admin/story/index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

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