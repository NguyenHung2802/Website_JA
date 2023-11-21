<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P&T Shop</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- link font chữ -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/productdetail.css">
    <link rel="stylesheet" href="./assets/css/reponsive1.css">
    <link rel="icon" href="./assets/img/logo/main.png" type="image/x-icon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
</head>
<style>
form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}

.sale-off-2 {
    top: 14px;
    right: 14px;
}

/* Mobile & tablet  */
@media (max-width: 1023px) {
    .sale-off-2 {
        top: 1px;
    }
}

/* tablet */
@media (min-width: 740px) and (max-width: 1023px) {
    .daonguoc {
        display: flex;
        flex-direction: column-reverse;
    }

    #main-img {
        max-width: unset;
    }

    #main-img img {
        width: 100%;
        margin-left: 0;
        margin-top: 0;
        background-size: cover;
        background-position: center;
        margin-bottom: 10px;
    }

    .all-img>li {
        display: inline-block;
    }

    .all-img {
        padding: unset;
    }

    .img-item img {
        width: 150px;
        cursor: pointer;
        margin: 5px 10px;
    }

    textarea {
        width: 100%;
    }

    .btn-comment {
        display: block;
        width: 100%;
        padding: 25px 0 35px 0;
        font-size: small;
    }

    .card:hover .hover-icon {
        display: none;
    }
}

/* mobile */
@media (max-width: 739px) {
    .card:hover .hover-icon {
        display: none;
    }

    .daonguoc {
        display: flex;
        flex-direction: column-reverse;
    }

    #main-img img {
        width: 100%;
        margin-left: 0;
        margin-top: 0;
        background-size: cover;
        background-position: center;
        margin-bottom: 10px;
    }

    .all-img>li {
        display: inline-block;
    }

    .all-img {
        padding: unset;
    }

    .img-item img {
        width: 80px;
        margin: 5px 2px;
    }

    .product__price {
        margin: 15px 0;
    }

    .product__wrap {
        display: block;
        margin: 15px 0;
    }

    .add-cart {
        width: 100%;
        padding: 10px 0;
        margin: 15px 0;
    }

    .product__shopnow {
        display: block;
    }

    .shopnow {
        width: 100%;
        margin-bottom: 15px;
    }

    .likenow {
        width: 100%;
    }

    .btn-comment {
        width: 100%;
    }

    .sale-off-2 {
        top: 1px;
    }
}
</style>
<?php
$sql_dssp = "SELECT * FROM products LIMIT 8";
$query_dssp = mysqli_query($connect, $sql_dssp);
?>

<body>
    <div class="overlay hidden"></div>

    <!-- product detail -->
    <div class="container">
        <div class="product__detail">
            <div class="row product__detail-row">
                <div class="col-lg-6 col-12 daonguoc">
                    <div class="img-product">
                    </div>

                    <div id="main-img" style="cursor: pointer;">
                        <?php
                        $sql_get_img = "SELECT * FROM products WHERE idProduct = 1";
                        $query_get_img = mysqli_query($connect, $sql_get_img);
                        $product = mysqli_fetch_array($query_get_img);
                        ?>
                        <img src="<?php echo $product['image'] ?>" class="big-img" alt="ảnh chính" id="img-main">
                        <div class="sale-off sale-off-2">
                            <span
                                class="sale-off-percent"><?php echo round(100 - ($product['sellingPrice'] / $product['costPrice']) * 100) ?>
                                %</span>
                            <span class="sale-off-label">GIẢM</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">

                    <div class="product__name">
                        <h2><?php echo $product['name'] ?></h2>
                    </div>


                    <div class="product__price">

                        <h2><?php  echo $product['sellingPrice']?>đ</h2>
                    </div>


                    <div class="price-old">
                        Giá gốc:
                        <del><?php echo $product['costPrice']?></del>
                        <span
                            class="discount"><?php echo round(100 - ($product['sellingPrice'] / $product['costPrice']) * 100) ?>%</span>
                    </div>
                    <div class="product__ROM">
                        <h2>Dung lượng: <?php  echo $product['ROM']?></h2>
                    </div>
                    <div class="product__camera">
                        <h2>Màn hình: <?php  echo $product['screen']?></h2>
                    </div>
                    <div class="product__color">
                        <h2>Màu sắc: <?php  echo $product['battery']?></h2>
                    </div>
                    <div class="product__wrap">
                        <div class="product__amount">
                            <label for="">Số lượng: </label>
                            <input type="button" value="-" class="control" onclick="tru()" id="cong">
                            <input type="text" value="1" class="text-input" id="text_so_luong"
                                onkeypress='validate(event)'>
                            <input type="button" value="+" class="control" onclick="cong()">
                        </div>
                        <button class="add-cart" onclick="fadeInModal()">Thêm vào giỏ</button>
                    </div>
                    <div class="product__shopnow">
                        <button class="shopnow">Mua ngay</button>
                        <span class="home-product-item__like home-product-item__like--liked">
                            <i class="home-product-item__like-icon-empty far fa-heart"
                                style="font-size: 24px;margin-top: 7px;"></i>
                            <i class="home-product-item__like-icon-fill fas fa-heart"
                                style="font-size: 24px;margin-top: 7px;"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__describe">
        <div class="container">
            <h2 class="product__describe-heading">Mô tả</h2>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">
                    <h3 class="name__product">Bảo hành chính hãng</h3>
                    <h3>Chính sách đổi trả: </h3>
                    <p>Bảo hành có cam kết trong 12 tháng (chỉ áp dụng cho sản phẩm chính, KHÔNG áp dụng cho phụ kiện
                        kèm theo)</p>

                    <p>Bảo hành trong vòng 15 ngày (từ lúc Khách hàng mang sản phẩm đến bảo hành đến lúc nhận lại sản
                        phẩm tối đa 15 ngày).</p>
                    <p>Sản phẩm không bảo hành lại lần 2 trong 30 ngày kể từ ngày máy được bảo hành xong.</p>
                    <p>Nếu TGDD/ĐMX vi phạm cam kết (bảo hành quá 15 ngày hoặc phải bảo hành lại sản phẩm lần nữa trong
                        30 ngày kể từ lần bảo hành trước), Khách hàng được áp dụng phương thức Hư gì đổi nấy ngay và
                        luôn hoặc Hoàn tiền với mức phí giảm 50%.</p>
                    <p>Từ tháng thứ 13 trở đi, không áp dụng bảo hành có cam kết, chỉ áp dụng bảo hành hãng nếu có.</p>
                    <p>Hư gì đổi nấy ngay & luôn</p>

                    <p>Hư sản phẩm chính: Đổi sản phẩm mới (cùng model, cùng dung lượng, cùng màu sắc) miễn phí tháng
                        đầu tiên, tháng thứ 2 đến tháng 12 chịu phí 10% hoá đơn/tháng. Nếu sản phẩm chính hết hàng thì
                        áp dụng Bảo hành có cam kết hoặc Hoàn tiền với mức phí giảm 50%.</p>
                    <p>Hư phụ kiện đi kèm: Đổi miễn phí trong vòng 12 tháng kể từ ngày mua sản phẩm chính bằng hàng phụ
                        kiện TGDĐ/ĐMX đang kinh doanh mới với công năng tương đương. Nếu không có phụ kiện tương đương
                        hoặc Khách hàng không thích thì áp dụng bảo hành hãng</p>
                    <p>Lỗi phần mềm không áp dụng, mà chỉ khắc phục lỗi phần mềm.</p>
                    <p>Trường hợp Khách hàng muốn đổi full box (nguyên thùng, nguyên hộp): ngoài việc áp dụng mức phí
                        đổi trả thì Khách hàng sẽ trả thêm phí lấy full box tương đương 20% giá trị hóa đơn.</p>
                    <p>Hoàn tiền</p>

                    <p>Tháng đầu tiên kể từ ngày mua: phí 20% giá trị hóa đơn.</p>
                    <p>Tháng thứ 2 đến tháng thứ 12: phí 10% giá trị hóa đơn/tháng.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="product__comment">
        <div class="container">
            <h2 class="product__describe-heading">Bình luận</h2>
            <div class="row">
                <div class="col-lg-4 col-12 mb-4">
                    <div class="home-product-item__rating"
                        style="font-size: 24px;transform-origin: left;margin-bottom: 5px">

                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="home-product-item__star--gold fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <textarea name="" id="" cols="70" rows="10"></textarea>
                    <button type="submit" class="btn btn-comment">Gửi</button>
                </div>

                <?php 
              $sql_rate = "SELECT * FROM feedbacks inner join users on users.idUser = feedbacks.idUser WHERE idProduct = 1";
              $query_rate = mysqli_query($connect, $sql_rate);
              ?>
                <div class="col-lg-8 col-12">


                    <div class="body__comment" style="align-items: center;">
                        <div class="comment" style="align-items: center; display: inline-block ">
                            <?php
                              while ($row_listrate = mysqli_fetch_array($query_rate)){
                                $rate = $row_listrate['Rate'];
                                ?>
                            <div style="display: flex;margin-bottom: 15px">
                                <img class=" comment-img"
                                    src="https://th.bing.com/th/id/R.3f0121e1219e92931a593d9de465b0d3?rik=BOH%2bpiXst89hLg&pid=ImgRaw&r=0"
                                    alt="">
                                <div class="comment__content">
                                    <div class="comment__content-heding">
                                        <h4 class="comment__content-name"><?php echo $row_listrate['fullName']?></h4>
                                        <span class="comment__content-time"
                                            style="padding-top: 2px"><?php echo $row_listrate['createdAt']?></span>
                                    </div>
                                    <div class="home-product-item__rating"
                                        style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                                        <!-- Đoạn này là để xem đáh giá bn sao và hiển thị số sao tương ứng -->
                                        <?php
                                        for ($i = 0; $i < 5; $i++) {
                                        $starClass = ($i < $rate ? "home-product-item__star--gold" : "");
                                        ?>
                                        <i class="fas fa-star <?= $starClass ?>"></i>
                                        <?php
                                        }
                                        ?>
                                        <!-- end -->
                                    </div>
                                    <div class="comment__content-content">
                                        <span><?php echo $row_listrate['content']?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
               }
              ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product detail -->

    <div id="alert-cart" class="alert" style="display:none">
        <div class="alert__heading">
            <h4>Thêm vào giỏ hàng</h4>
        </div>
        <div class="alert__body">
            <img src="./assets/img/product/addidas1.jpg" alt="" class="alert__body-img">
            <div>
                <h5 class="alert__body-name"></h5>

                <span class="alert__body-amount">Số lượng: 1</span>
                <h6 class="alert__body-price">2.000.000 VNĐ</h6>
            </div>
        </div>
        <div class="alert__footer">
            <a class="click__cart" style="border-radius: 4px">Xem giỏ hàng</a>
        </div>
    </div>
    <div class="overlay1" style="display: none" onclick="fadeout()">

    </div>
</body>
<script src="./assets/js/main.js"></script>
<script src="./assets/js/zoomsl.js"></script>
<script>
$(document).ready(function() {
    $(".big-img").imagezoomsl({
        zoomrange: [3, 3]

    });
});
</script>
<script>
function fadeInModal() {
    $('.alert').fadeIn();
    $('.overlay1').fadeIn();
}

function fadeOutModal() {
    $('.alert').fadeOut();
    $('.overlay1').fadeOut();
}

function fadeout() {
    $('.overlay1').fadeOut();
    $('.alert').fadeOut();
}
setInterval(fadeOutModal, 7000);
</script>

</html>