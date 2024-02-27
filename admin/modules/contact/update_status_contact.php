<?php
include("../../config/connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connect, "UPDATE contacts SET statusContact = 'Đã phản hồi' WHERE idContact = $id");
    if ($query) {
        header("location: ../../index.php?quanly=contacts");
    }
}
