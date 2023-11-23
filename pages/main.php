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
        if ($bientam == 'news') {
            include("main/news.php");
        }
        if ($bientam == 'news_detail') {
            include("main/news_detail.php");
        }
        if ($bientam == 'dangKy') {
            include("main/Dangky.php");
        }
        if ($bientam == 'dangNhap') {
            include("main/Dangnhap.php");
        }
        if ($bientam == 'cart') {
            include("main/cart.php");
        }
        if ($bientam == 'listlike') {
            include("main/listlike.php");
        }
        if ($bientam == 'gioithieu') {
            include("main/Gioithieu.php");
        }
        if ($bientam == 'pay') {
            include("main/pay.php");
        }
        ?>
    </div>
</div>