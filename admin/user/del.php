<?php
    require_once "../inc/header.php";
    //b1: lấy id
    $id = $_GET['id'];
    //b2: xóa + về trang index thông báo
    $query = "DELETE FROM users WHERE id = {$id}";
    $result = $mysqli->query($query);
    if($result){
        header("LOCATION:index.php?msg= xóa thành công");
    }else{
        echo "Có lỗi";
    }
?>