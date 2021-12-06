<?php
    require_once "../inc/header.php";
    $story_id = $_GET['story_id'];
    $query = "DELETE FROM story WHERE story_id = {$story_id}";
    $result = $mysqli->query($query);
    if($result){
        header('location:index.php?msg= Xóa thành công');
    }else{
        echo "Lỗi";
    }
