<?php
    session_start();
    include('../../admin/config/connect.php');
    $id = $_GET['id'];
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT COUNT(*)  AS record_count FROM favorite_products WHERE idUser = ".$id_user." AND idProduct= ".$id;
    $result_sql = mysqli_query($connect,$sql);
    $count = mysqli_fetch_assoc($result_sql);
    if($count['record_count'] < 1){
        $sql_add_favourite_product = "INSERT INTO favorite_products(idProduct,idUser) VALUE ('".$id."','".$_SESSION['id_user']."')";
        mysqli_query($connect,$sql_add_favourite_product);
    }
    
    
    header('Location:../../index.php');
?>
