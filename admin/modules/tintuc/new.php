<?php
// $sql = "SELECT * FROM news";
// $feedback = mysqli_query($connect, $sql);

$sql = "SELECT COUNT(id) as total from news";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 7;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;

$feedback = mysqli_query($connect, "SELECT * FROM news LIMIT $start, $limit");

?>
<section class="content-header" style="padding-bottom: 12px;">
    <h1>
        Quản lý bài viết
    </h1>
</section>

<style>
    th,
    td {
        text-align: center;
    }

    .wrap-modal {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 2;
        display: none;
    }

    .modal {
        display: block;
        width: 60%;
        height: 500px;
        margin: 0 auto;
        background-color: #f1f1f1;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);
        top: 50%;
        left: 56%;
        transform: translate(-50%, -50%);
        border-radius: 15px;
        overflow: auto;
    }

    .close {
        padding: 12px;
        margin: 12px 12px 0 0;
        font-size: 36px;
    }

    .open {
        display: block !important;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #ccc;
    }

    .title {
        font-size: 24px;
        font-weight: 900;
        margin-left: 42%;
    }

    .ic-close {
        padding-bottom: 8px;
    }

    .content {
        padding: 0 24px;
        font-size: 16px;
    }

    .btn {
        height: 35px;
    }
</style>

<!-- Main content -->
<section class="content" style="position: relative;">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách bài viết</h3>

           
        </div>
        <div class="box-body">
            <a href="../admin/index.php?quanly=add-new" class="btn btn-success" style="margin-bottom: 12px">Thêm mới bài viết</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã bài viết</th>
                        <th>Tiêu đề</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedback as $key => $value) : ?>
                        <tr>
                            <td style="width: 7%">
                                <?php echo $key + 1 ?>
                            </td>
                            <td style="width: 7%">
                                <?php echo $value['id'] ?>
                            </td>
                            <td style="width: 60%; text-align: start"><?php echo $value['title'] ?></td>
                            <td><?php echo $value['createdAT'] ?></td>
                            <td>
                                <button onclick="handleOpenModal(<?php echo $value['id'] ?>)" class="btn btn-primary">Xem chi tiết</button>
                                <a href="../admin/index.php?quanly=edit-new&id=<?php echo $value['id'] ?>" title="Sửa" class="btn btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="modules/tintuc/remove-new.php?id=<?php echo $value['id'] ?>" title="Xóa" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>

                            <div class="wrap-modal modal-id-<?php echo $value['id'] ?>">
                                <div class="modal">
                                    <div class="header" style="display: flex;">
                                        <div class="title">Chi tiết bài viết</div>
                                        <div onclick="handleCloseModal(<?php echo $value['id'] ?>)" class="close ">
                                            <i class="ic-close fa-solid fa-xmark"></i>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="content" style=" padding-bottom: 20px">
                                        <div>
                                            <h3 style="font-weight: 900;">Tiêu đề</h3>
                                            <?php echo $value['title'] ?>
                                        </div>
                                        <hr>

                                        <div>
                                            <h3 style="font-weight: 900;">Mô tả ngắn</h3>
                                            <?php echo $value['short_description'] ?>
                                        </div>
                                        <hr>
                                        <div>
                                            <h3 style="font-weight: 900;">Nội dung chính</h3>
                                            <?php echo $value['content'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <div class="pagination">
                <?php

                if ($current_page > 1 && $total_page > 1) {
                    echo '<a class="link-page" href="index.php?quanly=news&page=' . ($current_page - 1) . '">Prev</a>  ';
                }

                for ($i = 1; $i <= $total_page; $i++) {

                    if ($i == $current_page) {
                        echo '<span class="current-page">' . $i . '</span>  ';
                    } else {
                        echo '<a class="link-page" href="index.php?quanly=news&page=' . $i . '">' . $i . '</a>  ';
                    }
                }

                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a class="link-page" href="index.php?quanly=news&page=' . ($current_page + 1) . '">Next</a>  ';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    const modal = document.querySelector(".wrap-modal");
    const idNew = document.querySelector(".idNew");

    function handleOpenModal(key) {
        const modalByKey = document.querySelector(`.modal-id-${key}`);
        modalByKey.classList.add('open');
    }

    function handleCloseModal(key) {
        const modalByKey = document.querySelector(`.modal-id-${key}`);
        modalByKey.classList.remove('open');
    }
</script>
<style>
    .pagination {
        float: right;
    }

    .current-page {
        border: 1px solid #333;
        color: white;
        background-color: #333;
        padding: 4px 10px;
    }

    .link-page {
        border: 1px solid #333;
        color: black;

        padding: 4px 10px;
    }

    .link-page:hover {
        color: #333;
    }
</style>