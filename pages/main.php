<?php
#include ("sidebar/sidebar.php");
?>
<div class="maincontent">

    <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
    if (isset($_GET['quanly'])) {
        $bientam = $_GET['quanly'];
    } else {
        $bientam = "";
    }
    if ($bientam == 'contact') {
        include("main/contact.php");
    }
    ?>