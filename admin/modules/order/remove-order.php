<?php
include("../../config/connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM cart WHERE idCart = $id");
    if ($query) {
        header("location: ../../index.php?quanly=orders");
    }
}
