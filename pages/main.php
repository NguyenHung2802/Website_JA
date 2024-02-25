<div class="main">
    <?php
    #include ("sidebar/sidebar.php");
    ?>
    <div class="maincontent">

        <?php //lấy quan lý từ menu truyền vào bằng phương thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
        } else {
            $bientam = "";
            include("./pages/home.php");
        }
        if ($bientam == 'lienhe') {
            include("./pages/main/lienhe.php");
        }
        if ($bientam == 'showAllProduct') {
            include('main/showAllProduct.php');
        }
        if ($bientam == 'nhomsp') {
            include('main/groupProduct.php');
        }
        // if ($bientam == 'news') {
        //     include("main/news.php");
        // }
        if ($bientam == 'searching') {
            include("main/searching.php");
        }
        if ($bientam == 'news_detail') {
            include("main/news_detail.php");
        }
        // if ($bientam == 'dangKy') {
        //     include("main/Dangky.php");
        // }
        if ($bientam == 'dangNhap') {
            include("main/Dangnhap.php");
        }
        if ($bientam == 'cart') {
            include("main/giohang/cart.php");
        }
        if ($bientam == 'listlike') {
            include("main/listlike.php");
        }
        if ($bientam == 'gioithieu') {
            include("main/Gioithieu.php");
        }
        if ($bientam == 'trilieu') {
            include("main/trilieu.php");
        }
        if ($bientam == 'daotao') {
            include("main/daotao.php");
        }
        if ($bientam == 'sukien') {
            include("main/sukien.php");
        }
        if ($bientam == 'pay') {
            include("main/pay.php");
        }
        if ($bientam == 'productDetail') {
            include("main/ProductDetail.php");
        }
        if ($bientam == 'thongtin') {
            include("main/infor.php");
        }
        if ($bientam == 'dangXuat') {
            unset($_SESSION['id_user']);
            echo "<script>location.href = 'index.php'</script>";
        }
        ?>

        <div style="position: fixed; right: 20px; bottom: 40px;">
            <a href="javascript:void(0);" onclick="redirectToHiddenURL();">
                <img src="./img/Logo-Zalo-300823.png" style="width: 50px" alt="">
            </a>
        </div>

        <a href="">
            <div style="padding: 4px 8px 16px 8px; border-radius: 8px; position: fixed; z-index:1000; text-align: center; right: 140px; bottom: -6px; background-color: #e40d0f; width: 250px; height: 40px; ;line-height: 30px">
                <i style="color: white; font-size: 18px" class="fa-solid fa-phone"></i>
                <span style="color: white; font-size: 14px;">Tư vấn bán hàng <span style="font-weight: 700;"> 1800 0123 </span></span>
            </div>
        </a>

    </div>
</div>