<style>
  .wrap_btn_next-prev {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background-color: #ccc;
    border-radius: 50%;
  }
</style>

<?php
$sql_dssp = "SELECT * FROM products LIMIT 8";
$query_dssp = mysqli_query($connect, $sql_dssp);

$sql_dsspnew = "SELECT DISTINCT * FROM products WHERE tag = 'NEW'";
$query_dsspnew = mysqli_query($connect, $sql_dsspnew);

$sql_dssphot = "SELECT DISTINCT * FROM products WHERE tag = 'HOT'";
$query_dssphot = mysqli_query($connect, $sql_dssphot);
?>

<div class="container">
  <!-- slide show -->
  <div class="row" style="display: block">
    <section class="awe-section-1">
      <div class="mt-4 top-sliders col-md-12">
        <div class="slideshow">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
              <li data-target="#demo" data-slide-to="3"></li>
              <li data-target="#demo" data-slide-to="4"></li>
            </ul> -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide1.jpg?alt=media&token=5c4b22a0-88f6-43a5-9439-48f7f5c9cdc2" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide2.jpg?alt=media&token=94679ca0-6a19-482f-ab8c-d361f78883f3" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>
              <div class="carousel-item">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide4.png?alt=media&token=eecf657b-8b98-4cb9-91a6-e883989f3fd7" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide1.jpg?alt=media&token=c3ae3088-4d42-4946-ac48-4c1323b53459" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>
              <div class="carousel-item">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide5.jpg?alt=media&token=7475b105-b748-430e-aee5-b8fda49fa8d9" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide6.png?alt=media&token=28ff7f28-70db-4e15-853e-4dbb742d3133" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>
              <div class="carousel-item">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide7.png?alt=media&token=76d02e8d-14b2-476b-b209-f9570fbb985e" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide8.jpg?alt=media&token=ce471d33-ed09-464e-aded-a7d9b9d18767" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>
              <div class="carousel-item">
                <div style="display: flex">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide9.jpg?alt=media&token=5ad58cc0-affe-466c-bff0-061d43e8c396" alt="Los Angeles" width="50%" height="500">
                  <img style="padding: 2px; border-radius: 16px" src="https://firebasestorage.googleapis.com/v0/b/n7-php.appspot.com/o/imgSlide%2Fslide10.png?alt=media&token=e96b7b27-c3c4-4242-8706-493caffc7768" alt="Los Angeles" width="50%" height="500">
                </div>
              </div>

            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <div class="wrap_btn_next-prev">
                <span class="carousel-control-prev-icon"></span>
              </div>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <div class="wrap_btn_next-prev">
                <span class="carousel-control-next-icon"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end slide show -->
  <div class="product">
    <div class="container">

      <div class="product__new">
        <h3 class="product__ne title-product">Sản phẩm mới</h3>
        <div class="row">

          <?php
          while ($row_dsspnew = mysqli_fetch_array($query_dsspnew)) {
          ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
              <a href="./ProductDetail.html" class="product__new-item">
                <div class="card" style="width: 100%">
                  <div>
                    <img class="card-img-top" src="<?php echo $row_dsspnew['image'] ?>" alt="Card image cap">
                    <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">
                      <?php echo $row_dsspnew['name'] ?>
                    </h5>
                    <div class="product__price">
                      <p class="card-text price-color product__price-old"><?php echo $row_dsspnew['costPrice'] ?> đ</p>
                      <p class="card-text price-color product__price-new"><?php echo $row_dsspnew['sellingPrice'] ?> đ</p>
                    </div>
                    <div class="home-product-item__action">
                      <span class="home-product-item__like home-product-item__like--liked">
                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                      </span>

                      <?php
                      $idProduct = $row_dsspnew['idProduct'];
                      $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                      FROM feedbacks 
                      INNER JOIN products ON feedbacks.idFeedBack = products.idProduct
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
                      <span class="home-product-item__sold"><?php echo $row_dsspnew['sellNumber'] ?> đã bán</span>
                    </div>
                    <div class="sale-off">
                      <span class="sale-off-percent"><?php echo round(100 - ($row_dsspnew['sellingPrice'] / $row_dsspnew['costPrice']) * 100) ?> %</span>
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
      <!-- List sản phẩm hot -->
      <div class="product__sale">
        <h3 class="product__sale title-product">Top sản phẩm hot</h3>
        <div class="row">
          <?php
          while ($row_dssphot = mysqli_fetch_array($query_dssphot)) {
          ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
              <a href="./ProductDetail.html" class="product__new-item">
                <div class="card" style="width: 100%">
                  <div>
                    <img class="card-img-top" src="<?php echo $row_dssphot['image'] ?>" alt="Card image cap">
                    <form action="" class="hover-icon hidden-sm hidden-xs">
                      <input type="hidden">
                      <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
                        <i class="fas fa-cart-plus"></i>
                      </a>
                      <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                        <i class="fas fa-search"></i>
                      </a>
                    </form>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">
                      <?php echo $row_dssphot['name'] ?>
                    </h5>
                    <div class="product__price">
                      <p class="card-text price-color product__price-old"><?php echo $row_dssphot['costPrice'] ?> đ</p>
                      <p class="card-text price-color product__price-new"><?php echo $row_dssphot['sellingPrice'] ?> đ</p>
                    </div>
                    <div class="home-product-item__action">
                      <span class="home-product-item__like home-product-item__like--liked">
                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                      </span>

                      <?php
                      $idProduct = $row_dssphot['idProduct'];
                      $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                      FROM feedbacks 
                      INNER JOIN products ON feedbacks.idFeedBack = products.idProduct
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

        <!-- Ưu đãi đi kèm sản phẩm hot -->
        <section class="awe-section-9">
          <div class="section_policy clearfix">
            <div class="col-12">
              <div class="owl-policy-mobile">
                <div class="owl-stage-outer">
                  <div class="owl-stage">
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_1.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Miễn phí vận chuyển</h3>
                            <div class="section_policy_title">Cho các đơn hàng</div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_2.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Hỗ trợ 24/7</h3>
                            <div class="section_policy_title">Liên hệ hỗ trợ 24h/ngày</div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="	https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_3.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Hoàn tiền 100%</h3>
                            <div class="section_policy_title">Nếu sản phẩm bị lỗi, hư hỏng</div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="owl-item">
                      <div class="section_policy_content">
                        <a href="">
                          <img src="https://bizweb.dktcdn.net/100/344/983/themes/704702/assets/policy_images_4.png?1628514159582" alt="">
                          <div class="section-policy-padding">
                            <h3>Thanh toán</h3>
                            <div class="section_policy_title">Được bảo mật 100%</div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <div class="product__yml">
          <h3 class="product__yml title-product">Tất cả sản phẩm</h3>
          <div class="row">
            <?php
            while ($row_dssp = mysqli_fetch_array($query_dssp)) {
            ?>
              <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                <a href="./ProductDetail.html" class="product__new-item">
                  <div class="card" style="width: 100%">
                    <div>
                      <img class="card-img-top" src="<?php echo $row_dssp['image'] ?>" alt="Card image cap">
                      <form action="" class="hover-icon hidden-sm hidden-xs">
                        <input type="hidden">
                        <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
                          <i class="fas fa-cart-plus"></i>
                        </a>
                        <a data-toggle="modal" data-target="#myModal" class="quickview" title="Xem nhanh">
                          <i class="fas fa-search"></i>
                        </a>
                      </form>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title custom__name-product">
                        <?php echo $row_dssp['name'] ?>
                      </h5>
                      <div class="product__price">
                        <p class="card-text price-color product__price-old"><?php echo $row_dssp['costPrice'] ?> đ</p>
                        <p class="card-text price-color product__price-new"><?php echo $row_dssp['sellingPrice'] ?> đ</p>
                      </div>
                      <div class="home-product-item__action">
                        <span class="home-product-item__like home-product-item__like--liked">
                          <i class="home-product-item__like-icon-empty far fa-heart"></i>
                          <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                        </span>

                        <?php
                        $idProduct = $row_dssp['idProduct'];
                        $sql_rate = "SELECT AVG(feedbacks.Rate) AS average_rate
                        FROM feedbacks 
                        INNER JOIN products ON feedbacks.idFeedBack = products.idProduct
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
                        <span class="home-product-item__sold"><?php echo $row_dssp['sellNumber'] ?> đã bán</span>
                      </div>
                      <div class="sale-off">
                        <span class="sale-off-percent"><?php echo round(100 - ($row_dssp['sellingPrice'] / $row_dssp['costPrice']) * 100) ?> %</span>
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
    </div>
  </div>
  <div class="shoesnews">
    <div class="container">
      <h3 class="shoesnews__title">Tin tức</h3>
      <?php 
          $sql_show_news = "SELECT * FROM news LIMIT 3";
          $query_show_news = mysqli_query($connect,$sql_show_news);
        ?>
      <div class="row">
        <?php
          while($row=mysqli_fetch_array($query_show_news)){
          ?>
        <div class="col-lg-4 col-md-4 col-sm-12 mb-20">
          <a href="index.php?quanly=news_detail&id=<?php echo $row['id']?>" class="product__new-item">
            <div class="card" style="width: 100%">
              <img class="card-img-top" src="admin/news_management/uploads/<?php echo $row['image'] ?>" alt="Card image cap" height="230px">
              <div class="card-body">
                <h5 class="card-title custom__name-product title-news">
                  <?php echo $row['title']?>
                </h5>
                <p class="card-text custom__name-product" style="font-weight: 400;"><?php echo $row['short_description']?></p>
              </div>
            </div>
          </a>
        </div>
        <?php
          }
        ?>
      </div>
      <div class="shoesnews__all">
        <a href="index.php?quanly=news" class="shoesnews__all-tittle">Xem tất cả</a> <i class="fi-rs-angle-right"></i>
      </div>
    </div>
  </div>
</div>