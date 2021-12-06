<?php
//b1 khởi tạo đối tượng mysql
$mysqli = new mysqli(
    'localhost',
    'root',
    '',
    'bstory1'
);
//b2 thiết lập font chữ tiếng việt
$mysqli ->set_charset('utf8');
//b3 kiểm tra kết nối
if(mysqli_connect_errno()){
    echo "lỗi kết nối";
    exit();
}
