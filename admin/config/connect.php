<?php
$severname = "localhost:3366";
$username = "root";
$password = "";
$database = "n7_php_web_sell_phone1";

$connect = new mysqli($severname, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "loi ket noi" . mysqli_connect_error();
    exit();
}
