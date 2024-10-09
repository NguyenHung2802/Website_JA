<?php
session_start();
include "../../../admin/config/connect.php";
$id_user = $_SESSION['id_user'];
if (isset($_GET['cong'])) {
    $idProduct = $_GET['cong'];
    $sql_dssp = "UPDATE cart_detail
             INNER JOIN cart ON cart_detail.idCart = cart.idCart
             SET cart_detail.quantity = cart_detail.quantity + 1
             WHERE cart.idUser = $id_user AND cart_detail.idProduct = $idProduct";
    $query_dssp = mysqli_query($connect, $sql_dssp);
    header('Location:../../../index.php?quanly=cart');
}

if (isset($_GET['tru'])) {
    $idProduct = $_GET['tru'];
    $sql_dssp = "UPDATE cart_detail
             INNER JOIN cart ON cart_detail.idCart = cart.idCart
             SET cart_detail.quantity = cart_detail.quantity - 1
             WHERE cart.idUser = $id_user AND cart_detail.idProduct = $idProduct";
    $query_dssp = mysqli_query($connect, $sql_dssp);
    header('Location:../../../index.php?quanly=cart');
}
?>
