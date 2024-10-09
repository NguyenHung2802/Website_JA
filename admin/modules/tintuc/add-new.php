<?php

if (isset($_POST['sbAdd'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $short_description = $_POST['short_description'];

    // xử lý up ảnh 
    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../img/news/' . $file_name);
    }

    $sql = "INSERT INTO news (title,content,image,short_description)
            VALUES ('$title','$content','$file_name','$short_description')";

    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location: index.php?quanly=news');
    }
}
?>

<section class="content-header">
    <h1>
        Quản lý bài viết
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <link rel="stylesheet" href="./">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm mới bài viết</h3>
            <a style="padding-left: 24px;" href="../admin/index.php?quanly=news">Quay lại trang trước</a>
        </div>
        <div class="box-body">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input required type="text" class="form-control" id="" name="title">
                </div>
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <input required type="text" class="form-control" id="" name="short_description">
                </div>

                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea required class="form-control" id="" name="content" rows="4" cols="50"> </textarea>
                </div>

                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input required type="file" class="form-control" id="" name="image">
                </div>


                <button type="submit" name="sbAdd" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</section>