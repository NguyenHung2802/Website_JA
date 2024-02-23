<div class="main">
    <?php
    #include ("sidebar/sidebar.php");
    ?>
    <div class="maincontent">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
            if ($bientam == 'showAllProduct') {
                include("modules/product/product.php");
            }
            if ($bientam == 'main') {
                include("modules/chart.php");
            }
            if ($bientam == 'add-product') {
                include("modules/product/add-product.php");
            }
            if ($bientam == 'add-new') {
                include("modules/tintuc/add-new.php");
            }
            if ($bientam == 'add-user') {
                include("modules/user/add-user.php");
            }
            if ($bientam == 'edit-product') {
                include("modules/product/edit-product.php");
            }
            if ($bientam == 'edit-new') {
                include("modules/tintuc/edit-new.php");
            }
            if ($bientam == 'edit-user') {
                include("modules/user/edit-user.php");
            }
            if ($bientam == 'warehouse') {
                include("modules/khohang/khohang.php");
            }
            if ($bientam == 'news') {
                include("modules/tintuc/new.php");
            }
            if ($bientam == 'users') {
                include("modules/user/user.php");
            }
            if ($bientam == 'contacts') {
                include("modules/contact/contact.php");
            }
            if ($bientam == 'orders') {
                include("modules/order/order.php");
            }
            if ($bientam == 'order_detail') {
                include("modules/order/order_detail.php");
            }
        }
        ?>
    </div>
</div>