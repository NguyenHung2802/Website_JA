<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .wrap {
        width: 80%;
        margin: 0 auto;
        border: 1px dashed #ccc;
        display: flex;
        flex-direction: column;
        margin-top: 30px;
        padding: 20px;
        align-items: center;
        justify-content: center;
        height: 300px;
        border-radius: 20px;
    }
</style>

<?php
session_start();

include "../../admin/config/connect.php";
$id_user = $_SESSION['id_user'];

$sql_id_cart = "SELECT idCart FROM cart WHERE idUser = $id_user and statusCart = 0";
$query_cart = mysqli_query($connect, $sql_id_cart);
$idCart = mysqli_fetch_assoc($query_cart)['idCart'];
$currentDate = date("Y-m-d");
$sql_pay = "UPDATE cart SET payments = 'Thanh toán qua Momo', statusCart = 1, createdAt = '$currentDate' WHERE idUser = $id_user and statusCart = 0";
$query_pay = mysqli_query($connect, $sql_pay);

$sql_get_cart_detail = "SELECT idProduct, quantity from cart_detail where idCart = $idCart";
$query_get_cart_detail = mysqli_query($connect, $sql_get_cart_detail);

while ($row_get_cart_detail = mysqli_fetch_array($query_get_cart_detail)) {
    $idProduct1 = $row_get_cart_detail['idProduct'];
    $quantity1 = $row_get_cart_detail['quantity'];

    $sql_update_sellNum = "UPDATE products
        SET sellNumber = (sellNumber + $quantity1) where idProduct = $idProduct1";

    $query_update_sellNum = mysqli_query($connect, $sql_update_sellNum);
}
?>

<div class="container">
    <div class="wrap">
        <i class="fa-regular fa-circle-check" style="font-size: 60px; color: green;"></i>
        <h1>Thanh toán thành công</h1>
        <a href="../../index.php">Quay trở về trang chủ ... </a>
    </div>
</div>