<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_news = mysqli_query($connect, "SELECT * FROM news WHERE id = $id");
    $news = mysqli_fetch_assoc($query_news);
}

if (isset($_POST['sbUpdate'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $short_description = $_POST['short_description'];
    
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../img/news/' . $file_name);
    } else {
        $file_name = $news['image'];
    }


    $sql = "UPDATE news 
    SET 
        title = '$title',
        short_description = '$short_description',
        content = '$content',
        image = '$file_name'
    WHERE id = $id";

    $query = mysqli_query($connect, $sql);
    if ($query) {
        header('location: index.php?quanly=news');
    }
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý bài viết
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa bài viết</h3>
            <a style="padding-left: 24px;" href="../admin/index.php?quanly=news">Quay lại trang trước</a>

        </div>
        <div class="box-body">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Mã bài viết</label>
                    <input readonly value="<?php echo $news['id'] ?>" type="text" class="form-control" id="" name="id">
                </div>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="<?php echo $news['title'] ?>" type="text" class="form-control" id="" name="title">
                </div>
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <input value="<?php echo $news['short_description'] ?>" type="text" class="form-control" id="" name="short_description">
                </div>

                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <textarea class="form-control" id="content" name="content" rows="4" cols="50"><?php echo $news['content']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Ảnh bài viết</label>
                    <br />
                    <img style="width: 100px; padding-bottom: 12px" src="./../img/news/<?php echo $news['image'] ?>" alt="">
                </div>

                <div class="form-group">
                    <input type="file" class="form-control" id="" name="image">
                </div>

                <button name="sbUpdate" type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</section>