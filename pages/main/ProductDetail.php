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
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="./assets/css/base.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/productdetail.css">
  <link rel="stylesheet" href="./assets/css/reponsive1.css">
  <link rel="icon" href="./assets/img/logo/main.png" type="image/x-icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
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
            $image = mysqli_fetch_array($query_get_img);
            ?>
            <img src="<?php echo $image['image'] ?>" class="big-img" alt="ảnh chính" id="img-main">
            <div class="sale-off sale-off-2">
              <span class="sale-off-percent"><?php echo round(100 - ($image['sellingPrice'] / $image['costPrice']) * 100) ?> %</span>
              <span class="sale-off-label">GIẢM</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <?php
          $sql_get_name = "SELECT name FROM products WHERE idProduct = 1";
          $query_get_img = mysqli_query($connect, $sql_get_name);
          $name = mysqli_fetch_array($query_get_img);
          ?>
          <div class="product__name">
            <h2><?php echo $name['name'] ?></h2>
          </div>
          <div class="status-product">
            Trạng thái: <b>Còn hàng</b>
          </div>
          <div class="infor-oder">
            Loại sản phẩm: <b>Giày dép</b>
          </div>
          <div class="product__price">
            <h2>550.000đ</h2>
          </div>

          <div class="price-old">
            Giá gốc:
            <del>650.000đ</del>
            <span class="discount">(-20%)</span>
          </div>
          <div class="product__color d-flex" style="align-items: center;">
            <div class="title" style="font-size: 16px; margin-right: 10px;">
              Màu:
            </div>
            <div class="select-swap d-flex">

              <div class="circlecheck">
                <input type="radio" id="f-option" class="circle-1" name="selector" checked>
                <label for="f-option"></label>
                <div class="outer-circle"></div>
              </div>
              <div class="circlecheck">
                <input type="radio" id="g-option" class="circle-2" name="selector">
                <label for="g-option"></label>
                <div class="outer-circle"></div>
              </div>
              <div class="circlecheck">
                <input type="radio" id="h-option" class="circle-3" name="selector">
                <label for="h-option"></label>
                <div class="outer-circle"></div>
              </div>
            </div>
          </div>
          <div class="product__size d-flex" style="align-items: center;">
            <div class="title" style="font-size: 16px; margin-right: 10px;">
              Kích thước:
            </div>
            <div class="select-swap">
              <div class="swatch-element" data-value="38">
                <input type="radio" class="variant-1" id="swatch-1-38" name="mau" value="trung" onclick="check()">
                <label for="swatch-1-38" class="sd"><span>38</span></label>
              </div>
              <div class="swatch-element" data-value="39">
                <input type="radio" class="variant-1" id="swatch-1-39" name="mau" value="thanh" onclick="check()">
                <label for="swatch-1-39" class="sd"><span>39</span></label>
              </div>
              <div class="swatch-element" data-value="40">
                <input type="radio" class="variant-1" id="swatch-1-40" name="mau" value="hieu" onclick="check()">
                <label for="swatch-1-40" class="sd"><span>40</span></label>
              </div>
            </div>
          </div>
          <div class="product__wrap">
            <div class="product__amount">
              <label for="">Số lượng: </label>
              <input type="button" value="-" class="control" onclick="tru()" id="cong">
              <input type="text" value="1" class="text-input" id="text_so_luong" onkeypress='validate(event)'>
              <input type="button" value="+" class="control" onclick="cong()">
            </div>
            <button class="add-cart" onclick="fadeInModal()">Thêm vào giỏ</button>
          </div>
          <div class="product__shopnow">
            <button class="shopnow">Mua ngay</button>
            <span class="home-product-item__like home-product-item__like--liked">
              <i class="home-product-item__like-icon-empty far fa-heart" style="font-size: 24px;margin-top: 7px;"></i>
              <i class="home-product-item__like-icon-fill fas fa-heart" style="font-size: 24px;margin-top: 7px;"></i>
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
          <h3 class="name__product">NIKE MERCURIAL SUPERFLY 8 ACADEMY TF</h3>
          <h3>Thông số kĩ thuật: </h3>
          <p>Phân khúc: Academy (tầm trung).</p>
          <p>Upper: Synthetic - Da tổng hợp cao cấp.</p>
          <p>Thiết kế đinh giày: Các đinh cao su hình chữ nhật, xếp chồng chéo với nhau. Theo đánh giá của nhiều người chơi thì những đinh TF hình chữ nhật lần này giúp đôi giày có thể trụ vững hơn trên sân.</p>
          <p>Độ ôm chân: Cao</p>
          <p>Bộ sưu tập: SAFARI PACK - Ra mắt tháng 4/2021</p>
          <p>PTrên chân các cầu thủ nổi tiếng như: Cristiano Ronaldo, Kylian Mbappé, Erling Haaland, Jadon Sancho, Leroy Sané, Romelu Lukaku...</p>
        </div>
      </div>
    </div>
  </div>
  <div class="product__comment">
    <div class="container">
      <h2 class="product__describe-heading">Bình luận</h2>
      <div class="row">
        <div class="col-lg-4 col-12 mb-4">
          <div class="home-product-item__rating" style="font-size: 24px;transform-origin: left;margin-bottom: 5px">
            <i class="home-product-item__star--gold fas fa-star"></i>
            <i class="home-product-item__star--gold fas fa-star"></i>
            <i class="home-product-item__star--gold fas fa-star"></i>
            <i class="home-product-item__star--gold fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <textarea name="" id="" cols="70" rows="10"></textarea>
          <button type="submit" class="btn btn-comment">Gửi</button>
        </div>
        <div class="col-lg-8 col-12">
          <div class="body__comment">
            <div class="comment" style="align-items: center;">
              <img class="comment-img" src="./assets/img/product/noavatar.png" alt="">
              <div class="comment__content">
                <div class="comment__content-heding">
                  <h4 class="comment__content-name">Nguyễn Quốc Trung</h4>
                  <span class="comment__content-time">2021-11-12</span>
                </div>
                <div class="home-product-item__rating" style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <div class="comment__content-content">
                  <span>Đẹp quá</span>
                </div>
              </div>
            </div>
            <div class="comment">
              <img class="comment-img" src="./assets/img/product/noavatar.png" alt="">
              <div class="comment__content">
                <div class="comment__content-heding">
                  <h4 class="comment__content-name">Nguyễn Quốc Trung</h4>
                  <span class="comment__content-time">2021-11-12</span>
                </div>
                <div class="home-product-item__rating" style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <div class="comment__content-content">
                  <span>Quá đẹp</span>
                </div>
              </div>
            </div>
            <div class="comment">
              <img class="comment-img" src="./assets/img/product/noavatar.png" alt="">
              <div class="comment__content">
                <div class="comment__content-heding">
                  <h4 class="comment__content-name">Nguyễn Quốc Trung</h4>
                  <span class="comment__content-time">2021-11-12</span>
                </div>
                <div class="home-product-item__rating" style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <div class="comment__content-content">
                  <span>Đẹp quá</span>
                </div>
              </div>
            </div>
            <div class="comment">
              <img class="comment-img" src="./assets/img/product/noavatar.png" alt="">
              <div class="comment__content">
                <div class="comment__content-heding">
                  <h4 class="comment__content-name">Nguyễn Quốc Trung</h4>
                  <span class="comment__content-time">2021-11-12</span>
                </div>
                <div class="home-product-item__rating" style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="home-product-item__star--gold fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <div class="comment__content-content">
                  <span>Sản phẩm tốt</span>
                </div>
              </div>
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