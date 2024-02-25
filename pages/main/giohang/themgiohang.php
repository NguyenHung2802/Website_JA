<?php
session_start();
include "../../../admin/config/connect.php";
if (!isset($_SESSION['id_user'])) {
    echo
    "<script>
    var result = confirm('Chức năng này yêu cầu đăng nhập?');
    if (result) {
        location.href = '../../../index.php?quanly=dangNhap'
    } else {
        location.href = '../../../index.php'
    }
    </script>";
} else {

    $id_user = $_SESSION['id_user'];

    $sql_get_idCart = "SELECT idCart FROM cart WHERE idUser = $id_user and statusCart = 0";
    $query_get_idCart = mysqli_query($connect, $sql_get_idCart);
    $idCartResult = mysqli_fetch_array($query_get_idCart);

    if ($idCartResult == null) {
        $sql_create_cart = "INSERT INTO cart (idUser, statusCart, payments) values ($id_user, 0, null)";
        $query_create_idCart = mysqli_query($connect, $sql_create_cart);
        $sql_get_idCart = "SELECT idCart FROM cart WHERE idUser = $id_user and statusCart = 0";
        $query_get_idCart = mysqli_query($connect, $sql_get_idCart);

        $idCartResult1 = mysqli_fetch_array($query_get_idCart);
        $idCart = $idCartResult1['idCart'];
    } else {
        $idCart = $idCartResult['idCart'];
    }

    if (isset($_GET['idP'])) {
        $idProduct = $_GET['idP'];
        if (!isset($_GET['qtt']))
            $qtt = 1;
        $qtt = $_GET['qtt'];

        $sql_get_count = "SELECT COUNT(*) AS count FROM cart inner join cart_detail on cart.idCart = cart_detail.idCart WHERE cart.idCart = $idCart and idProduct = $idProduct";
        $countProduct = mysqli_query($connect, $sql_get_count);
        $countResult = mysqli_fetch_assoc($countProduct);

        $sql_handle_cart;

        if ($countResult['count'] > 0) {
            $sql_handle_cart = "UPDATE cart_detail
            INNER JOIN cart ON cart_detail.idCart = cart.idCart
            SET cart_detail.quantity = cart_detail.quantity + $qtt
            WHERE cart.idCart = $idCart AND cart_detail.idProduct = $idProduct";
        } else
            $sql_handle_cart = "INSERT INTO cart_detail (idCart, idProduct, quantity)
            values ($idCart, $idProduct, $qtt)";

        $query_handle_cart = mysqli_query($connect, $sql_handle_cart);
        header('Location:../../../index.php?quanly=cart');
    }
}
