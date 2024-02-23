<?php
include("../../config/connect.php");
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    $query = mysqli_query($connect, "UPDATE cart SET statusCart = $status WHERE idCart = $id");
    if ($query) {
        header("location: ../../index.php?quanly=orders");
    }
}
