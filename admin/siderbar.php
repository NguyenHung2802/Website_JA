<?php
include 'config/connect.php';
$admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : [];

if (empty($admin)) {
    header('location: login.php');
}
?>

<style>
    .open {
        display: block;
    }

    .transform {
        transform: rotate(-90deg);
    }

    i {
        padding-right: 8px;
    }
</style>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../img/no-avt.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Xin chào: <?php echo $admin['fullName'] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="index.php?quanly=users">
                    <i class="fa-solid fa-users"></i> <span>Quản lý người dùng</span>
                </a>
            </li>
            <li class="treeview" onclick="handleOpenMenu()">
                <a href="#">
                    <i class="fa-brands fa-product-hunt"></i> <span>Quản lý sản phẩm</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?quanly=showAllProduct"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                    <li><a href="index.php?quanly=add-product"><i class="fa fa-circle-o"></i> Thêm mới sản phẩm</a></li>
                </ul>
            </li>
            <li>
                <a href="index.php?quanly=warehouse">
                    <i class="fa-solid fa-warehouse"></i> <span>Quản lý kho hàng</span>
                </a>
            </li>
            <li>
                <a href="index.php?quanly=orders">
                    <i class="fa-solid fa-credit-card"></i> <span>Quản lý đơn hàng</span>
                </a>
            </li>
            <li>
                <a href="index.php?quanly=news">
                    <i class="fa-solid fa-envelopes-bulk"></i> <span>Quản lý bài viết</span>
                </a>
            </li>
            <li>
                <a href="index.php?quanly=contacts">
                    <i class="fa-regular fa-envelope"></i> <span>Hỗ trợ khách hàng</span>
                </a>
            </li>
            <li>
                <a href="index.php?quanly=main">
                    <i class="fa-solid fa-chart-simple"></i> <span>Thống kê</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

<script>
    const treeviewMenu = document.querySelector(".treeview-menu");
    const pullRight = document.querySelector(".arrow-left");

    function handleOpenMenu() {
        treeviewMenu.classList.toggle("open");
        pullRight.classList.toggle("transform");
    }
</script>