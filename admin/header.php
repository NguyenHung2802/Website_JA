<?php
include 'config/connect.php';
ob_start();
session_start();

$admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : [];

if (empty($admin)) {
    header('location: login.php');
}

if (isset($_POST['sbLogout'])) {
    unset($_SESSION['admin']);
    echo "<script>location.href = 'login.php'</script>";
}
?>


<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php?quanly=main" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Trang quản trị</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li onclick="handleDropdown()" class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <img src="../img/no-avt.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo !empty($user) ? $admin['name'] : 'Tài Khoản' ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../img/no-avt.png" class="img-circle" alt="User Image">

                                    <p>
                                        Tài khoản: <?php echo !empty($admin) ? $admin['fullName'] : 'Tài Khoản' ?>
                                        <small>Ngày tạo: <?php echo !empty($admin) ? $admin['createdAt'] : '0/0/0' ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <form action="" method="post">
                                        <div class="pull-right">
                                            <button name="sbLogout" type="submit" class="btn btn-default btn-flat">
                                                Đăng xuất
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <script>
            const dropdown = document.querySelector(".user-menu");

            function handleDropdown() {
                dropdown.classList.toggle("open");
            }
        </script>