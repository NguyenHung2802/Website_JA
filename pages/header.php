<style>
    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Mobile & tablet  */
    @media (max-width: 1023px) {}

    /* tablet */
    @media (min-width: 740px) and (max-width: 1023px) {
        .owl-item {
            width: 396px;
            padding: 16px 0;
        }

        .card:hover .hover-icon {
            display: none;
        }
    }

    /* mobile */
    @media (max-width: 739px) {
        .owl-item {
            float: unset;
            padding: 16px 0;
        }

        .card:hover .hover-icon {
            display: none;
        }
    }
</style>
<?php

$sql_nhomsp = "SELECT DISTINCT byCompany FROM products";
$query_nhomsp = mysqli_query($connect, $sql_nhomsp);
?>
<header class="header">
    <div class="container">
        <div class="top-link clearfix hidden-sm hidden-xs">
            <div class="row">
                <div class="col-6 social_link">
                    <div class="social-title">Theo dõi: </div>
                    <a href=""><i class="fab fa-facebook" style="font-size: 24px; margin-right: 10px"></i></a>
                    <a href=""><i class="fab fa-instagram" style="font-size: 24px; margin-right: 10px;color: pink;"></i></a>
                    <a href=""><i class="fab fa-youtube" style="font-size: 24px; margin-right: 10px;color: red;"></i></a>
                    <a href=""><i class="fab fa-twitter" style="font-size: 24px; margin-right: 10px"></i></a>
                </div>
                <div class="col-6 login_link">
                    <ul class="header_link right m-auto">
                        <li>
                            <a href="./Login.html"><i class="fas fa-sign-in-alt mr-3"></i>Đăng nhập</a>
                        </li>
                        <li>
                            <a href="./registration.html"><i class="fas fa-user-plus mr-3" style="margin-left: 10px;"></i>Đăng kí</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-main clearfix">
            <div class="row">
                <div class="col-lg-3 col-100-h">
                    <div id="trigger-mobile" class="visible-sm visible-xs"><i class="fas fa-bars"></i></div>
                    <div class="logo">
                        <a href="">
                            <img width="150px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/logo-shop-dien-thoai-7.png?alt=media&token=cfea5d67-44e4-42fe-b97b-bbea196a7c6e" alt="">
                        </a>
                    </div>
                    <div class="mobile_cart visible-sm visible-xs">
                        <a href="./cart.html" class="header__second__cart--icon">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="header__second__cart--notice" class="header__second__cart--notice">3</span>
                        </a>
                        <a href="./listlike.html" class="header__second__like--icon">
                            <i class="far fa-heart"></i>
                            <span id="header__second__like--notice" class="header__second__like--notice">3</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 m-auto pdt15">
                    <form class="example" action="./Product.html">
                        <input type="text" class="input-search" placeholder="Tìm kiếm.." name="search">
                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-3 m-auto hidden-sm hidden-xs">
                    <div class="item-car clearfix">
                        <a href="./cart.html" class="header__second__cart--icon">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="header__second__cart--notice" class="header__second__cart--notice">3</span>
                        </a>
                    </div>
                    <div class="item-like clearfix">
                        <a href="./listlike.html" class="header__second__like--icon">
                            <i class="far fa-heart"></i>
                            <span id="header__second__like--notice" class="header__second__like--notice">3</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="header_nav hidden-sm hidden-xs">
        <div class="container">
            <ul class="header_nav-list nav">
                <li class="header_nav-list-item "><a href="index.php" class="active">Trang chủ</a></li>
                <li class="header_nav-list-item"><a href="index.php?quanly=contact">Giới thiệu</a></li>
                <li class="header_nav-list-item has-mega">
                    <a href="./Product.html">Sản phẩm<i class="fas fa-angle-right" style="margin-left: 5px;"></i></a>
                    <div class="mega-content" style="overflow-x: hidden; width: 70%; top: 32px ">
                        <div class="row">
                            <ul class="col-8 no-padding level0">
                                <ul class="level1">
                                    <p class="hmega" href="./Product.html">Chọn theo hãng</p>
                                    <?php
                                    while ($row_nhomsp = mysqli_fetch_array($query_nhomsp)) {
                                    ?>
                                        <li class="level2">
                                            <a href="index.php?quanly=nhomsp&id=<?php echo $row_nhomsp['byCompany'] ?>">
                                                <?php echo $row_nhomsp['byCompany'] ?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <ul class="level1">
                                    <p class="hmega" href="./Product.html">Chọn theo mức giá</p>
                                    <li class="level2">
                                        <a href="index.php?quanly=nhomsp&id=<?php ?>">Dưới 1 triệu </a>
                                    </li>
                                    <li class="level2">
                                        <a href="index.php?quanly=nhomsp&id=<?php ?>">Từ 1 - 3 triệu </a>
                                    </li>
                                    <li class="level2">
                                        <a href="index.php?quanly=nhomsp&id=<?php ?>">Từ 3 - 5 triệu </a>
                                    </li>
                                    <li class="level2">
                                        <a href="index.php?quanly=nhomsp&id=<?php ?>">Từ 3 - 5 triệu </a>
                                    </li>
                                </ul>
                </li>
            </ul>
            <div class="col-4">
                <a href="">
                    <picture>
                        <img src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/banner%2Fdien-thoai-cu-vinh-long-3.png?alt=media&token=c9619c77-fd9b-4cd8-9bbe-b2b06a8ac546" alt="" width="95%">
                    </picture>
                </a>
            </div>
        </div>
        </div>
        </li>
        <li class="header_nav-list-item"><a href="./news.html">Tin tức</a></li>
        <li class="header_nav-list-item"><a href="index.php?quanly=contact">Liên hệ</a></li>
        </ul>
        </div>
    </nav>
</header>