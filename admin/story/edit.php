<?php require_once '../../admin/inc/header.php' ?>
<?php require_once '../../admin/inc/leftbar.php' ?>
<script type="text/javascript">
    document.title = 'Edit Story | VinaEnter Edu';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa Truyện</h2>
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
                                $story_id = $_GET['story_id'];
                                $select = "SELECT * FROM story WHERE story_id = {$story_id}";
                                if ($mysqli->query($select)) {
                                    $infoStory = mysqli_fetch_assoc($mysqli->query($select));
                                }
                                if (isset($_POST['submit'])) {
                                    //  var_dump($_POST);
                                    //Thêm thông tin vào db chưa cần thêm hình ảnh
                                    $name = $_POST['name'];
                                    $cat_id = $_POST['cat_id'];
                                    $preview_text = $_POST['preview_text'];
                                    $detail_text = $_POST['detail_text'];

                                    //xử lí upload ảnh
                                    if ($_FILES['picture']['name']) {
                                        //xử lí upload ảnh
                                        $fileName = $_FILES['picture']['name'];
                                        $arFile = explode('.', $fileName);
                                        $typeFile = end($arFile);
                                        $newFileName = 'Story_' . time() . '.' . $typeFile;
                                        $tmpName = $_FILES['picture']['tmp_name'];
                                        $resultUpload = move_uploaded_file($tmpName, '../../files/uploads/' . $newFileName);
                                        if ($resultUpload) {
                                            echo "thêm thành công";
                                        }
                                    }
                                    $query = "UPDATE `story` SET name ='{$name}', cat_id={$cat_id}, preview_text ='{$preview_text}', detail_text='{$detail_text}', picture='{$newFileName}' WHERE story_id = '{$story_id}'";
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                        header('location:index.php?msg= Thêm truyện thành công');
                                    } else { {
                                            echo "Lỗi";
                                        }
                                    }


                                    //  var_dump($_FILES);
                                }
                                ?>
                                <form action="" method="POST" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên truyện:</label>
                                        <input type="text" value="<?php echo $infoStory['name'] ?>" name="name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="cat_id">
                                            <option value="">Danh Mục</option>
                                            <?php
                                            $queryCat = "SELECT * FROM cat";
                                            $resultCat = $mysqli->query($queryCat);
                                            while ($arCat = mysqli_fetch_assoc($resultCat)) {
                                            ?>
                                                <option value="<?php echo $arCat['cat_id'] ?>">
                                                    <?php echo $arCat['name'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh:</label>
                                        <input type="file" name="picture" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả:</label>
                                        <textarea  name="preview_text" id="" cols="30" rows="10" class="form-control"> <?php echo htmlspecialchars($infoStory['preview_text']); ?> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết:</label>
                                        <textarea  name="detail_text" id="" cols="30" rows="10" class="form-control ckeditor"> <?php echo htmlspecialchars($infoStory['detail_text']); ?> </textarea>
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