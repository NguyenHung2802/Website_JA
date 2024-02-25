<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_users = mysqli_query($connect, "SELECT * FROM users WHERE idUser = $id");
    $user = mysqli_fetch_assoc($query_users);
}

if (isset($_POST['sbUpdate'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $spaname = $_POST['spaname'];
    $bac = $_POST['bac'];
    $hassPass = md5($password);

    $sql = "UPDATE users 
    SET 
        fullName = '$fullName',
        email = '$email',
        password = '$hassPass',
        address = '$address',
        phone = '$phone'
    WHERE idUser = $id";

    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location: index.php?quanly=users');
    }
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý người dùng
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa thông tin người dùng</h3>
            <a style="padding-left: 24px;" href="../admin/index.php?quanly=users">Quay lại trang trước</a>

        </div>
        <div class="box-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Mã người dùng</label>
                    <input readonly value="<?php echo $user['idUser'] ?>" type="text" class="form-control" id="" name="fullName">
                </div>
                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input value="<?php echo $user['fullName'] ?>" type="text" class="form-control" id="" name="fullName">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input value="<?php echo $user['email'] ?>" type="text" class="form-control" id="" name="email">
                </div>

                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input value="<?php echo $user['password'] ?>" type="text" class="form-control" id="" name="password">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input value="<?php echo $user['phone'] ?>" type="text" class="form-control" id="" name="phone">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input value="<?php echo $user['address'] ?>" type="text" class="form-control" id="" name="address">
                </div>

                <button name="sbUpdate" type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</section>