<?php
error_reporting(1);
$currency = '$'; // đơn vị tiền tệ
$db_username = 'root'; // user name
$db_password = '';// password
$db_name = 'demo'; // tên cơ sở dữ liệu
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
mysqli_set_charset($mysqli,"utf8");
?>