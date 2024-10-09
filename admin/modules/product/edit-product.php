<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_pro = mysqli_query($connect, "SELECT * Fobject products WHERE idProduct = $id");
    $pro = mysqli_fetch_assoc($query_pro);
}

if (isset($_POST['sbUpdate'])) {
    $name = $_POST['name'];
    $costPrice = $_POST['costPrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $benifit = $_POST['benifit'];
    $descride = $_POST['descride'];
    $introduce = $_POST['introduce'];
    $object = $_POST['object'];
    $instruct = $_POST['instruct'];
    $tag = $_POST['tag'];
    $idProduct = $pro['idProduct'];

    if (isset($_FILES['image'])  && $_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../img/product/' . $file_name);
    } else {
        $file_name = $pro['image'];
    }

    // sửa

    $sql = "UPDATE products 
    SET 
        name = '$name',
        image = '$file_name',
        costPrice = '$costPrice',
        sellingPrice = '$sellingPrice',
        benifit = '$benifit',
        descride = '$descride',
        introduce = '$introduce',
        object = '$object',
        instruct = '$instruct',
        tag = '$tag'
    WHERE idProduct = $idProduct";

    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location: index.php?quanly=showAllProduct');
    }
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý sản phẩm
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa sản phẩm</h3>
            <a style="padding-left: 24px;" href="../admin/index.php?quanly=showAllProduct">Quay lại trang trước</a>

        </div>
        <div class="box-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Mã sản phẩm </label>
                    <input readonly type="text" class="form-control" id="" name="idProduct" value="<?php echo $pro['idProduct'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm </label>
                    <input type="text" class="form-control" id="" name="name" value="<?php echo $pro['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Giá gốc sản phẩm</label>
                    <input type="text" class="form-control" id="" name="costPrice" value="<?php echo $pro['costPrice'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Giá bán sản phẩm</label>
                    <input type="text" class="form-control" id="" name="sellingPrice" value="<?php echo $pro['sellingPrice'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Lợi ích</label>
                    <input type="text" class="form-control" id="" name="benifit" value="<?php echo $pro['benifit'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Miêu tả</label>
                    <input type="text" class="form-control" id="" name="descride" value="<?php echo $pro['descride'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Giới thiệu sản phẩm</label>
                    <input type="text" class="form-control" id="" name="introduce" value="<?php echo $pro['introduce'] ?>">
                </div>

                <!-- <div class="form-group">
                    <label for="">introduce</label>
                    <input type="text" class="form-control" id="" name="introduce" value="<?php echo $pro['introduce'] ?>">
                </div> -->

                <div class="form-group">
                    <label for="">Đối tượng</label>
                    <input type="text" class="form-control" id="" name="object" value="<?php echo $pro['object'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Hướng dẫn</label>
                    <input type="text" class="form-control" id="" name="instruct" value="<?php echo $pro['instruct'] ?>">
                </div>

                <div class="form-group">
                    <label for="">TAG</label>
                    <input readonly type="text" class="form-control" id="" name="tag" value="<?php echo $pro['tag'] ?>">
                    <label style="padding-top: 12px;" for="">Chọn TAG</label>
                    <select id="tag" name="tag">
                        <option value="DEFAULT" selected>Default</option>
                        <option value="HOT">Hot</option>
                        <option value="NEW">New</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <br />
                    <img style="width: 100px; padding-bottom: 12px" src="./../img/product/<?php echo $pro['image'] ?>" alt="">
                    <input type="file" class="form-control" id="" name="image">
                </div>

                <button name="sbUpdate" type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</section>