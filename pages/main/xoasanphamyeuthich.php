<?php
session_start();
include('../../admin/config/connect.php');
$id = $_GET['id'];
$id_user = $_SESSION['id_user'];
$sql_remove_favourite_product = "DELETE from favorite_products Where idProduct = $id and idUser = $id_user";
mysqli_query($connect, $sql_remove_favourite_product);

header('Location:../../index.php?quanly=listlike&page=1');
