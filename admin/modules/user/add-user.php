<?php

if (isset($_POST['sbAdd'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $spaname = $_POST['spaname'];
    $bac = $_POST['bac'];


    // $hassPass = md5($password);
    $sql = "INSERT INTO users (fullName,email,spaname,bac,password,address, phone, isAdmin)
            VALUES ('$fullName','$email','$spaname','$bac','$address', '$phone', 0)";

    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location: index.php?quanly=users');
    }
}
?>

<section class="content-header">
    <h1>
        Quản lý người dùng
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <link rel="stylesheet" href="./">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm mới người dùng</h3>
            <a style="padding-left: 24px;" href="../admin/index.php?quanly=users">Quay lại trang trước</a>
        </div>
        <div class="box-body">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" id="" name="fullName">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="" name="email">
                </div>

                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="text" class="form-control" id="" name="password">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" id="" name="phone">
                </div>
                <div class="form-group">
                    <label for="">Tên đại lý</label>
                    <input type="text" class="form-control" id="" name="spaname">
                </div>
                <div class="form-group">
                    <label for="">Bậc đại lý</label>
                    <input type="text" class="form-control" id="" name="bac">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name="address">
                </div>
                <button type="submit" name="sbAdd" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</section>