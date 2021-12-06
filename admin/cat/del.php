<?php
    require_once "../inc/header.php";
    //b1: lấy id
    $cat_id = $_GET['cat_id'];
    //b2: xóa + về trang index thông báo
    $query = "DELETE FROM cat WHERE cat_id = {$cat_id}";
    $result = $mysqli->query($query);
    if($result){
        header("LOCATION:index.php?msg= xóa thành công");
    }else{
        echo "Có lỗi";
    }
?>