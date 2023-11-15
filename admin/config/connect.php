<?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "n7_php_web_sell_phone";

$connect = new mysqli($severname, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "loi ket noi" . mysqli_connect_error();
    exit();
}
