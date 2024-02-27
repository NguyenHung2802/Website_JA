<?php

if (isset($_POST['sbAdd'])) {
    $name = $_POST['name'];
    $costPrice = $_POST['costPrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $benifit = $_POST['benifit'];
    $descride = $_POST['descride'];
    $introduce = $_POST['introduce'];
    $object = $_POST['object'];
    $instruct = $_POST['instruct'];
    $tag = $_POST['tag'];

    // xử lý up ảnh 
    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../img/product/' . $file_name);
    }

    $sql = "INSERT INTO products (byCompany,name,image,costPrice,sellingPrice,benifit,descride,introduce,object,instruct,tag,sellNumber)
            VALUES ('$company','$name','$file_name','$costPrice','$sellingPrice','$benifit', '$descride', '$introduce', '$object', '$instruct', '$tag', 0)";

    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location: index.php?quanly=showAllProduct');
    }
}
?>

<section class="content-header">
    <h1>
        Quản lý sản phẩm
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <link rel="stylesheet" href="./">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm mới sản phẩm</h3>
            <a style="padding-left: 24px;" href="../admin/index.php?quanly=showAllProduct">Quay lại trang trước</a>
        </div>
        <div class="box-body">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Công ty </label>
                    <input required type="text" class="form-control" id="" name="byCompany">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm </label>
                    <input required type="text" class="form-control" id="" name="name">
                </div>

                <div class="form-group">
                    <label for="">Giá gốc sản phẩm</label>
                    <input required type="text" class="form-control" id="" name="costPrice">
                </div>

                <div class="form-group">
                    <label for="">Giá bán sản phẩm</label>
                    <input required type="text" class="form-control" id="" name="sellingPrice">
                </div>

                <div class="form-group">
                    <label for="">Lợi ích</label>
                    <input required type="text" class="form-control" id="" name="benifit">
                </div>

                <div class="form-group">
                    <label for="">Miêu tả</label>
                    <input required type="text" class="form-control" id="" name="camera">
                </div>

                <div class="form-group">
                    <label for="">Giới thiệu</label>
                    <input required type="text" class="form-control" id="" name="descride">
                </div>

                <div class="form-group">
                    <label for="">introduce</label>
                    <input required type="text" class="form-control" id="" name="introduce">
                </div>

                <div class="form-group">
                    <label for="">object</label>
                    <input required type="text" class="form-control" id="" name="object">
                </div>

                <div class="form-group">
                    <label for="">Dung lượng bin</label>
                    <input required type="text" class="form-control" id="" name="instruct">
                </div>

                <div class="form-group">
                    <label for="">TAG</label>
                    <select id="tag" name="tag">
                        <option value="Default" selected>Default</option>
                        <option value="HOT">Hot</option>
                        <option value="NEW">New</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input required type="file" class="form-control" id="" name="image">
                </div>

                <button type="submit" name="sbAdd" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>