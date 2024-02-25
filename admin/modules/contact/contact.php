<?php
$sql = "SELECT * FROM contacts inner join users on contacts.idUser = users.idUser";
$contact_user = mysqli_query($connect, $sql);

?>
<section class="content-header" style="padding-bottom: 12px;">
    <h1>
        Quản lý yêu cầu hỗ trợ
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
            <h3 class="box-title">Danh sách yêu cầu hỗ trợ</h3>

            <!-- <a style="height: 34px; float: right" href="modules/contact/remove_contact.php?id=all" title="Xóa" class="btn btn-danger">
                Xóa tất cả các yêu cầu đã phản hồi
            </a> -->
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ngày tạo</th>
                        <!-- <th>Trạng thái</th> -->
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contact_user as $key => $value) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $value['fullName'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['phone'] ?></td>
                            <td><?php echo $value['topic'] ?></td>
                            <td><?php echo $value['content'] ?></td>
                            <td><?php echo $value['createdAt'] ?></td>

                            <!-- <?php
                            if ($value['statusContact'] == 'Chưa phản hồi') {
                            ?>
                                <td style="background-color: aquamarine;"><?php echo $value['statusContact'] ?></td>

                            <?php
                            } else {
                            ?>
                                <td style="background-color: cadetblue;"><?php echo $value['statusContact'] ?></td>
                            <?php
                            }
                            ?> -->

                            <td>
                                <!-- <a href="modules/contact/update_status_contact.php?id=<?php echo $value['idContact'] ?>" title="Sửa" class="btn btn-primary">
                                    Xác nhận
                                </a> -->
                                <a style="height: 34px;" href="modules/contact/remove_contact.php?id=<?php echo $value['idContact'] ?>" title="Xóa" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</section>