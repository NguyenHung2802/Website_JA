<?php
include 'config/connect.php';
session_start();
if (isset($_POST['sbLogin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email' AND isAdmin = true");

    if (mysqli_num_rows($query) == 1) {

        $data = mysqli_fetch_assoc($query);

        if (md5($password) == $data['password']) {
            $_SESSION['admin'] = $data;
            header('location: index.php?quanly=main');
        } else {
            echo "<script>alert('Sai thông tin tài khoản')</script>";
        }
    } else {
        echo "<script>alert('Sai thông tin tài khoản')</script>";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page | Log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/AdminLTE.css">
    <link rel="stylesheet" href="../assets/css/_all-skins.min.css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="../assets/js/angular.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <!-- The Modal -->
    <div class="login-box" style="width: 600px">
        <div class="login-logo">
            <h1>ADMIN</h1>
        </div>

        <div class="login-box-body">
            <p style="font-size: 24px;" class="login-box-msg">Đăng nhập</p>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input style="height: 60px" type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group has-feedback">
                    <input style="height: 60px" type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button name="sbLogin" type="submit" style="font-size: 16px; padding: 10px" class="btn btn-primary btn-block btn-flat mt-4">Đăng nhập</button>
                    </div>

                </div>
            </form>
        </div>

    </div>


    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>