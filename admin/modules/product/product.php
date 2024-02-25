<?php

if (isset($_POST['search']) && trim($_POST['search']) != '') {
    $search = $_POST['search'];
    $sql_product = "SELECT * FROM products WHERE idProduct = '$search' ";
    $sql_li = "SELECT COUNT(idProduct) as total from products WHERE idProduct = '$search' ";
} else {
    $sql_product = "SELECT * FROM products";
    $sql_li = "SELECT COUNT(idProduct) as total from products";
}

$result = mysqli_query($connect, $sql_li);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 7;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page && $total_page != 0) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;
$sql_product .= " LIMIT $start, $limit";

$product = mysqli_query($connect, $sql_product);
?>

<!-- =============================================== -->

<section class="content-header">
    <h1>
        Quản lý sản phẩm
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
            <h3 class="box-title">Danh sách sản phẩm</h3>
        </div>

        <form action="" method="post" style="margin-top: 8px;">
            <div class="box-header with-border">
                <span style="font-size: 16px;" class="box-title">Tìm kiếm sản phẩm</span>
                <input type="text" name="search" placeholder="Nhập mã" style=" height: 33px; padding: 8px; margin: 0 8px;">
                <input type="submit" class="btn btn-primary" value="Tìm kiếm"></input>
            </div>
        </form>

        <div class="box-body">
            <a href="../admin/index.php?quanly=add-product" class="btn btn-success" style="margin-bottom: 12px">Thêm mới sản phẩm</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá gốc sản phẩm</th>
                        <th>Giá bán sản phẩm</th>
                        <th>Công ty</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($product as $key => $value) : ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value['idProduct'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo number_format($value['costPrice']) ?> VNĐ</td>
                            <td><?php echo number_format($value['sellingPrice']) ?>VNĐ</td>
                            <td><?php echo $value['byCompany'] ?></td>
                            <td>
                                <img src="./../img/product/<?php echo $value['image'] ?>" alt="" width="50px">
                            </td>
                            <td><?php echo $value['createdAt'] ?></td>
                            <td>
                                <a href="../admin/index.php?quanly=edit-product&id=<?php echo $value['idProduct'] ?>" title="Sửa" class="btn btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="modules/product/remove-product.php?id=<?php echo $value['idProduct'] ?>" title="Xóa" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <div class="pagination">
                <?php

                if ($current_page > 1 && $total_page > 1) {

                    echo '<a class="link-page" href="index.php?quanly=showAllProduct&page=' . ($current_page - 1) . '">Prev</a>  ';
                }

                for ($i = 1; $i <= $total_page; $i++) {

                    if ($i == $current_page) {
                        echo '<span class="current-page">' . $i . '</span>  ';
                    } else {
                        echo '<a class="link-page" href="index.php?quanly=showAllProduct&page=' . $i . '">' . $i . '</a>  ';
                    }
                }

                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a class="link-page" href="index.php?quanly=showAllProduct&page=' . ($current_page + 1) . '">Next</a>  ';
                }
                ?>
            </div>
        </div>

</section>
</div>
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

    .search-product {
        float: right;
        margin-right: 30px;
    }
</style>