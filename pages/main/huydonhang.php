<?php
include('../../admin/config/connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connect, "UPDATE cart SET statusCart = 2 WHERE idCart = $id");
    if ($query) {
        echo
        "<script>
        alert('Hủy thành công!')
          location.href = '../../index.php?quanly=thongtin'
        </script>";
    }
}
