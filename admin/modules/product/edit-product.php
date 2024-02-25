<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_pro = mysqli_query($connect, "SELECT * FROM products WHERE idProduct = $id");
    $pro = mysqli_fetch_assoc($query_pro);
}

if (isset($_POST['sbUpdate'])) {
    $company = $_POST['byCompany'];
    $name = $_POST['name'];
    $costPrice = $_POST['costPrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $screen = $_POST['screen'];
    $CPU = $_POST['CPU'];
    $RAM = $_POST['RAM'];
    $ROM = $_POST['ROM'];
    $battery = $_POST['battery'];
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
        byCompany = '$company',
        name = '$name',
        image = '$file_name',
        costPrice = '$costPrice',
        sellingPrice = '$sellingPrice',
        screen = '$screen',
        CPU = '$CPU',
        RAM = '$RAM',
        ROM = '$ROM',
        battery = '$battery',
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
                    <label for="">Công ty </label>
                    <input type="text" class="form-control" id="" name="byCompany" value="<?php echo $pro['byCompany'] ?>">
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
                    <label for="">Màn hình</label>
                    <input type="text" class="form-control" id="" name="screen" value="<?php echo $pro['screen'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Camera</label>
                    <input type="text" class="form-control" id="" name="camera" value="<?php echo $pro['camera'] ?>">
                </div>

                <div class="form-group">
                    <label for="">CPU</label>
                    <input type="text" class="form-control" id="" name="CPU" value="<?php echo $pro['CPU'] ?>">
                </div>

                <div class="form-group">
                    <label for="">RAM</label>
                    <input type="text" class="form-control" id="" name="RAM" value="<?php echo $pro['RAM'] ?>">
                </div>

                <div class="form-group">
                    <label for="">ROM</label>
                    <input type="text" class="form-control" id="" name="ROM" value="<?php echo $pro['ROM'] ?>">
                </div>

                <div class="form-group">
                    <label for="">Dung lượng bin</label>
                    <input type="text" class="form-control" id="" name="battery" value="<?php echo $pro['battery'] ?>">
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