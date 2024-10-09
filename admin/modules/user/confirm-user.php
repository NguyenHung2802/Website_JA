<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_users = mysqli_query($connect, "SELECT * FROM users WHERE idUser = $id");
    $user = mysqli_fetch_assoc($query_users);
}

if (isset($_POST['sbUpdate'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $spaname = $_POST['spaname'];
    $isApproved = $_POST['isApproved'];

    $sql = "UPDATE users 
    SET 
        fullName = '$fullName',
        email = '$email',
        spaname = '$spaname',
        isApproved = '$isApproved'
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
            <h3 class="box-title">Xác nhận người dùng</h3>
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
                    <label for="">Tên đại lý</label>
                    <input value="<?php echo $user['spaname'] ?>" type="text" class="form-control" id="" name="spaname">
                </div>
                <div class="form-group">
                    <label for="">Cho phép người dùng đăng nhập để mua sắm</label>
                    <input value="<?php echo $user['isApproved'] ?>" type="text" class="form-control" id="" name="isApproved">
                </div>
                

                <button name="sbUpdate" type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
</section>