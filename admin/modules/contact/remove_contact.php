<?php
include("../../config/connect.php");
if (isset($_GET['id']) && $_GET['id'] != 'all') {
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM contacts WHERE idContact = $id");
    if ($query) {
        header("location: ../../index.php?quanly=contacts");
    }
}

if (isset($_GET['id']) && $_GET['id'] == 'all') {
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM contacts WHERE statusContact = 'Đã phản hồi'");
    if ($query) {
        header("location: ../../index.php?quanly=contacts");
    }
}
