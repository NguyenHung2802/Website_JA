<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juliette Armand</title>
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
  .product__comment .btn.btn-comment{
    display: block;
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

  .product__sale{
    padding: 0px 20px;
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
// $idProduct = $_GET['id'];
// $sql_get_product = "SELECT * FROM products WHERE idProduct = $idProduct";
// $query_get_product = mysqli_query($connect, $sql_get_product);
// $product = mysqli_fetch_array($query_get_product);

$idProduct = $_GET['id'];
if (isset($_SESSION['id_user'])) {
  $id_user = $_SESSION['id_user'];
}
$sql_get_product = "SELECT * FROM products WHERE idProduct = $idProduct";
$query_get_product = mysqli_query($connect, $sql_get_product);
$product = mysqli_fetch_array($query_get_product);

if (isset($_POST['submitFormFB'])) {
  $rating = $_POST['rating'];
  $content = $_POST['body_feedback'];

  $sql_createFb = "insert into feedbacks (Rate, content, idProduct, idUser) values ($rating, '$content', $idProduct, $id_user)";
  $query_createFb = mysqli_query($connect, $sql_createFb);
}
$quantityProduct = 1;
?>

<body>
  <div class="overlay hidden"></div>

  <!-- product detail -->
  <div class="container">
    <div class="topdistance"></div>
    <div class=" product__detail">
      <div class="row product__detail-row">
        <div class="col-lg-6 col-12 daonguoc" style="border: 1px solid #ccc; border-radius: 15px; position: relative">
          <div id="main-img" style="cursor: pointer; position: static">
            <img style="width: 80%; margin: 0; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); z-index: 0" src="./img/product/<?php echo $product['image'] ?>" class="big-img" alt="ảnh chính" id="img-main">
            <div class="sale-off sale-off-2">
              <span class="sale-off-percent"><?php echo round(100 - ($product['sellingPrice'] / $product['costPrice']) * 100) ?>
                %</span>
              <span class="sale-off-label">GIẢM</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12" style="padding: 10px">

            <div class="product__name" style="padding: 10px; font-size: 40px">
              <b>
                <?php echo $product['name'] ?>
              </b>
            </div>
            <div class="product__price" style="padding: 10px">

          <?php
          // Xử lý việc tính sao trung bình của mỗi sp và hiển thị ra màn hình
          $idProduct = $product['idProduct'];
          $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                      FROM feedbacks 
                      WHERE feedbacks.idProduct = $idProduct
                      GROUP BY feedbacks.idProduct";
          $query_rate = mysqli_query($connect, $sql_rate);
          $row_average_rate = mysqli_fetch_array($query_rate);
          if ($row_average_rate)
            $rate_avg = round($row_average_rate['average_rate']);
          else $rate_avg = 0;
          ?>
          <div class="home-product-item__rating" style="font-size: 24px; margin-left: -140px; padding-bottom: 12px">

            <?php
            for ($i = 0; $i < 5; $i++) {
              $starClass = ($i < $rate_avg) ? "home-product-item__star--gold" : "";
            ?>
              <i class="fas fa-star <?= $starClass ?>"></i>
            <?php
            }
            ?>
          </div>
          <!-- Kết thúc mã xử lý -->
          <div class="product__price-dis">
            
            <div class="product__price" style="padding: 10px">
              
            <h2 style="font-size: 25px"><?php echo number_format($product['sellingPrice']) ?> <span>đ</span></h2>
          </div>
          <div class="price-old" style="padding: 10px">
            
            <del><?php echo number_format($product['costPrice']) ?>  <span>đ</span></del>
            <span class="discount"><?php echo round(100 - ($product['sellingPrice'] / $product['costPrice']) * 100) ?>%</span>
          </div>
          </div>   
          
          <div class="product__benifit">
            <p><?php echo $product['benifit'] ?></p>
          </div>
          <form class="myForm" action="" method="POST">
            <div class="product__wrap">
              <div class="product__amount">
                <label for="">Số lượng: </label>

                <input type="button" value="-" class="control" onclick="tru()">
                <input readonly type="text" class="qtt text-input" name="qtt" value="<?php echo $quantityProduct ?>">
                <input type="button" value="+" class="control" onclick="cong()">
              </div>
              <br />
              <button type="submit" class="add-cart" onclick="fadeInModal()">Thêm vào giỏ hàng</button>
            </div>
          </form>
          <div style="font-size: 14px; opacity: 0.4;">Số lượng còn trong kho:
            <span class="qttStock"><?php echo $product['qttStock'] ?></span>
          </div>
          <hr>
          
        </div>
      </div>
    </div>
    <div class="product__describe">
            <div class="container" style="padding: 0 !important">
              <div class="col-11" style="padding: 0 !important">
                <div class="product_specifications" style="font-size: 16px">
                  <h2 style="padding: 8px 0;" class="name__product">Tìm hiểu sản phẩm</h2>        
                  <div class="product__descride product__cs">
                    <p class="des">Mô tả </p> <p class="p"><?php echo $product['descride'] ?> </p>
                  </div>
                  <div class="product__introduce product__cs">
                    <p class="des">Giới thiệu sản phẩm</p> <p class="p"><?php echo $product['introduce'] ?></p>
                  </div> 
                  <div class="product__object product__cs">
                    <p class="des">Đối tượng </p><p  class="p"><?php echo $product['object'] ?></p>
                  </div>
                  <div class="product__benifit product__cs">
                    <p class="des">Lợi ích </p> <p  class="p"><?php echo $product['benifit'] ?></p>
                  </div>
                  <div class="product__instruct product__cs">
                    <p class="des">Hướng dẫn sử dụng </p> <p class="p"><?php echo $product['instruct'] ?></p>
                  </div>
                  <div class="product__note product__cs">
                    <p class="des">Thành phần và lưu ý </p> <p  class="p"><?php echo $product['note'] ?></p>
                  </div>

                </div>
              </div>
            </div>
          </div>
    <div class="product__comment">
      <h2 class="product__describe-heading mb-4">Bình luận</h2>
      <div class="row" style="flex-wrap:nowrap">
        <form action="" method="post">
          <div class="col-12 mb-4">
            <div class="d-flex mb-4">
              <h4>Điểm đánh giá</h4>
              <select name="rating" id="rate" style="height: 25px; font-size: 14px; width: 40px" class="ml-4 sbRate">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <textarea style="font-size: 12px;" name="body_feedback" id="" cols="70" rows="10"></textarea>
            <?php
            if (isset($_SESSION['id_user'])) {
              ?>
              <button type="submit" name="submitFormFB" class="btn btn-comment">Gửi</button>
            <?php
            } else {
            ?>
              <div class="btn btn-comment" style="width: 250px; line-height: 20px">
                <a style="font-size: 10px !important; color: white !important; text-decoration: none; padding: 8px 19px" href="index.php?quanly=dangNhap">Vui lòng đăng nhập để gửi đánh giá !</a>
              </div>
            <?php
            }
            ?>
          </div>
        </form>
        
        <?php
        $sql_rate = "SELECT * FROM feedbacks inner join users on users.idUser = feedbacks.idUser WHERE idProduct = $idProduct";
        $query_rate = mysqli_query($connect, $sql_rate);
        ?>
        <div class="col-lg-8 col-12">
          <div class="body__comment" style="align-items: center">
            <div class="comment" style="align-items: center; display: inline-block ">
              <?php
              while ($row_listrate = mysqli_fetch_array($query_rate)) {
                $rate = $row_listrate['Rate'];
                ?>
                <div style="display: flex;margin-bottom: 15px">
                  <img class=" comment-img"
                    src="https://th.bing.com/th/id/R.3f0121e1219e92931a593d9de465b0d3?rik=BOH%2bpiXst89hLg&pid=ImgRaw&r=0"
                    alt="">
                  <div class="comment__content">
                    <div class="comment__content-heding">
                      <h4 class="comment__content-name">
                        <?php echo $row_listrate['fullName'] ?>
                      </h4>
                      <span class="comment__content-time" style="padding-top: 2px">
                        <?php echo $row_listrate['createdAt'] ?>
                      </span>
                    </div>
                    <div class="home-product-item__rating"
                      style="font-size: 14px;transform-origin: left;margin-bottom: 5px">
                      Đánh giá sao
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
                      <span>
                        <?php echo $row_listrate['content'] ?>
                      </span>
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
  </div>
      </div>
    </div>
  </div> 
  
  <!-- List sản phẩm hot -->
  <div class="product__sale">
      <h3 class="product__sale title-product">Sản phẩm đề xuất</h3>
      <div class="row">
        <?php

        $sql_dssphot = "SELECT DISTINCT * FROM products WHERE tag = 'HOT' ORDER BY RAND() LIMIT 4";
        $query_dssphot = mysqli_query($connect, $sql_dssphot);
        while ($row_dssphot = mysqli_fetch_array($query_dssphot)) {
        ?>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
            <a href="index.php?quanly=productDetail&id=<?php echo $row_dssphot['idProduct'] ?>" class="product__new-item">
              <div class="card" style="width: 100%">
                <div>
                  <img class="card-img-top" src="./img/product/<?php echo $row_dssphot['image'] ?>" alt="Card image cap">
                  <form action="" class="hover-icon hidden-sm hidden-xs">
                    <input type="hidden">
                    <a href="pages/main/giohang/themgiohang.php?idP=<?php echo $row_dssphot['idProduct'] ?>&qtt=1" class="btn-add-to-cart" title="Thêm vào giỏ hàng">
                      <i class="fas fa-cart-plus"></i>
                    </a>
                    <a href="index.php?quanly=productDetail&id=<?php echo $row_dssphot['idProduct'] ?>" class="quickview" title="Xem nhanh">
                      <i class="fas fa-search"></i>
                    </a>
                  </form>
                </div>
                <div class="card-body">
                  <h5 class="card-title custom__name-product">
                    <?php echo $row_dssphot['name'] ?>
                  </h5>
                  <div class="product__price">
                    <p class="card-text price-color product__price-old"><?php echo number_format($row_dssphot['costPrice']) ?> đ</p>
                    <p class="card-text price-color product__price-new"><?php echo number_format($row_dssphot['sellingPrice']) ?> đ</p>
                  </div>
                  <div class="home-product-item__action">
                    <span class="home-product-item__like home-product-item__like--liked">
                      <?php
                      $idProduct_spnew = $row_dssphot['idProduct'];
                      $row_product_favourite_spnew['countSP'] = null;
                      if (isset($_SESSION['id_user'])) {
                        $sql_product_favourite_spnew = "SELECT COUNT(*) as countSP FROM favorite_products WHERE idProduct = $idProduct_spnew and idUser = $id_user";
                        $query_product_favourite_spnew = mysqli_query($connect, $sql_product_favourite_spnew);
                        $row_product_favourite_spnew = mysqli_fetch_array($query_product_favourite_spnew);
                      }
                      if ($row_product_favourite_spnew['countSP'] > 0 && $row_product_favourite_spnew['countSP'] != null) {
                      ?>
                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                        <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/xoasanphamyeuthich.php?id=' . $row_dssphot['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                          <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                        </a>
                      <?php
                      } else {
                      ?>
                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                        <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/sanphamyeuthich.php?id=' . $row_dssphot['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                          <i class="fa-regular fa-heart"></i>
                        </a>
                      <?php

                      } ?>
                    </span>

                    <?php
                    $idProduct = $row_dssphot['idProduct'];
                    $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                      FROM feedbacks 
                      WHERE feedbacks.idProduct = $idProduct
                      GROUP BY feedbacks.idProduct";
                    $query_rate = mysqli_query($connect, $sql_rate);
                    $row_average_rate = mysqli_fetch_array($query_rate);
                    if ($row_average_rate)
                      $rate_avg = round($row_average_rate['average_rate']);
                    else $rate_avg = 0;
                    ?>
                    <div class="home-product-item__rating">

                      <?php
                      for ($i = 0; $i < 5; $i++) {
                        $starClass = ($i < $rate_avg) ? "home-product-item__star--gold" : "";
                      ?>
                        <i class="fas fa-star <?= $starClass ?>"></i>
                      <?php
                      }
                      ?>

                    </div>
                    <span class="home-product-item__sold"><?php echo $row_dssphot['sellNumber'] ?> đã bán</span>
                  </div>
                  <div class="sale-off">
                    <span class="sale-off-percent"><?php echo round(100 - ($row_dssphot['sellingPrice'] / $row_dssphot['costPrice']) * 100) ?> %</span>
                    <span class="sale-off-label">GIẢM</span>
                  </div>
                </div>
              </div>
            </a>
          </div>

        <?php
        }
        ?>
      </div>
    </div>
  </div>
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
    const qttProduct = document.querySelector(".qtt");
    const myForm = document.querySelector(".myForm");
    const qttStock = document.querySelector(".qttStock");
    myForm.action = "pages/main/giohang/themgiohang.php?idP=<?php echo $product['idProduct'] ?>&qtt=" + qttProduct.value;

    function tru() {
      if (qttProduct.value > 1) {
        qttProduct.value = parseInt(qttProduct.value) - 1;
        myForm.action = "pages/main/giohang/themgiohang.php?idP=<?php echo $product['idProduct'] ?>&qtt=" + qttProduct.value;
      }
    }

    function cong() {
      if (qttProduct.value < parseInt(qttStock.textContent)) {
        qttProduct.value = parseInt(qttProduct.value) + 1;
        myForm.action = "pages/main/giohang/themgiohang.php?idP=<?php echo $product['idProduct'] ?>&qtt=" + qttProduct.value;
      } else {
        alert("Vượt quá số lượng trong kho!")
      }
    }

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

    function handleSb() {
      const selectBox = document.querySelector("#rate");
      var selectedIndex = selectBox.selectedIndex;

      console.log(selectBox.options[selectedIndex].value);

    }

    function handleSubmit() {

    }

    setInterval(fadeOutModal, 7000);
  </script>

</html>
  

