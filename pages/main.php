<div class="main">
    <?php
    #include ("sidebar/sidebar.php");
    ?>
    <div class="maincontent">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
        } else {
            $bientam = "";
            include("./pages/show_products.php");
        }
        if ($bientam == 'contact') {
            include("main/contact.php");
        }
        if ($bientam == 'showAllProduct') {
            include('main/showAllProduct.php');
        }
        if ($bientam == 'nhomsp') {
            include('main/groupProduct.php');
        }
        ?>
    </div>
</div>