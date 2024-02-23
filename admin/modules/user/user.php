<?php
$sql = "SELECT * FROM users where email != 'admin@gmail.com'";
$users = mysqli_query($connect, $sql);

?>
<section class="content-header" style="padding-bottom: 12px;">
    <h1>
        Quản lý người dùng
    </h1>
</section>

<style>
    th,
    td {
        text-align: center;
    }
</style>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách người dùng</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="../admin/index.php?quanly=add-user" class="btn btn-success" style="margin-bottom: 12px">Thêm mới người dùng</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã người dùng</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Tên Đại lý</th>
                        <th>Bậc Đại lý</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value['idUser'] ?></td>
                            <td><?php echo $value['fullName'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['password'] ?></td>
                            <td><?php echo $value['spaname'] ?></td>
                            <td><?php echo $value['bac'] ?></td>
                            <td><?php echo $value['address'] ?></td>
                            <td><?php echo $value['phone'] ?></td>
                            <td><?php echo $value['createdAt'] ?></td>
                            <td>
                                <a href="../admin/index.php?quanly=edit-user&id=<?php echo $value['idUser'] ?>" title="Sửa" class="btn btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</section>