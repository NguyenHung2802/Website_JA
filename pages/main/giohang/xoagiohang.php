<?php
session_start();
include "../../../admin/config/connect.php";
$id_user = $_SESSION['id_user'];
if (isset($_GET['idP']) && isset($_GET['idCart'])) {
    $idProduct = $_GET['idP'];
    $idCart = $_GET['idCart'];
    $sql_deleteCart = "delete from cart_detail 
                where idCart = $idCart and idProduct = $idProduct";
    $query_deleteCart = mysqli_query($connect, $sql_deleteCart);
    header('Location:../../../index.php?quanly=cart');
}
