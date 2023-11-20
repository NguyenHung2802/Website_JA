
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
  .all-img > li {
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
  .card:hover .hover-icon{
    display: none;
  }
}
/* mobile */
@media (max-width: 739px) {
  .card:hover .hover-icon{
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
  .all-img > li {
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
$sql_anh = "SELECT DISTINCT byCompany FROM products";
$query_anh = mysqli_query($connect, $sql_anh);
?>

<?php 
$sql_color = "SELECT DISTINCT byCompany FROM products";
$query_color = mysqli_query($connect, $sql_color);
?>

<?php
$sql_swatchelement = "SELECT DISTINCT byCompany FROM products";
$query_swatchelement = mysqli_fetch_array($connect, $sql_swatchelement);
?>

<?php
$sql_relate = "SELECT DISTINCT byCompany FROM products";
$query_relate  = mysqli_fetch_array($connect, $sql_relate );
?>
<?php
$sql_comment = "SELECT DISTINCT byCompany FROM products";
$query_comment = mysqli_fetch_array($connect, $sql_comment);
?>
      <!-- product detail -->
      <div class="container">
      <div class="product__detail">
          <div class="row product__detail-row">
            <div class="col-lg-6 col-12 daonguoc">
              <div class="img-product">
                <ul class="all-img">
                <?php 
                        while ($row_anh = mysqli_fetch_array($query_anh)) {
                            ?>
                                <li class="img-item">
                                    <img src="<?php echo $row_anh['src']; ?>" 
                                    class="small-img" alt="<?php echo $row_anh['alt']; ?>"
                                    onclick="changeImg('<?php echo $row_anh['id'];?>')" 
                                    id="<?php echo $row_anh['id']; ?>">
                                </li>
                            <?php
                            }
                    ?>
                <li class="img-item">
                    <img src="https://cdn.tgdd.vn/Products/Images/42/305658/Slider/vi-vn-iphone-15-pro-max-4-1020x570.jpg" 
                    class="small-img" alt="anh 1" onclick="changeImg('one')" id="one">
                </li>
        
                  
                </ul>
              </div>
              <div id="main-img" style="cursor: pointer;" >
                <img src="https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-tu-nhien-2-1.jpg" 
                class="big-img" alt="ảnh chính" id="img-main"
                 xoriginal="https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-tu-nhien-2-1.jpg">
                <div class="sale-off sale-off-2">
                  <span class="sale-off-percent">2%</span>
                  <span class="sale-off-label">GIẢM</span>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="product__name">
                <h2>Điện thoại iPhone 15 Pro Max</h2>
              </div>
              <div class="status-product">
                Trạng thái: <b>Còn hàng</b>
              </div>
              <div class="infor-oder">
                Loại sản phẩm: <b>Iphone</b>
              </div>
              <div class="product__price">
                <h2>34.590.000đ</h2>
              </div>

              <div class="price-old">
                Giá gốc: 
                <del>34.990.000đ</del>
                <span class="discount">(-2%)</span>
              </div>
              
              <div class="product__color d-flex" style="align-items: center;">
                <div class="title" style="font-size: 16px; margin-right: 10px;">
                  Màu: 
                </div>
                <div class="select-swap d-flex">
                
                <?php 
                        while ($row_color = mysqli_fetch_array($query_color)) {
                            ?>
                                <a href="<?php echo $row_color['href'] ?>" data-color="<?php echo $row_color['data-color'] ?>" 
                                data-code ="<?php echo $row_color['data-code'] ?>" class="box03__item item act"></a>
                            <?php
                            }
                    ?>
                    <a href="/dtdd/iphone-15-pro-max?code=0131491003835" data-color="1198" data-code="0131491003835" 
                    class="box03__item item act">Titan tự nhiên</a>



                </div>
              </div>
              <div class="product__size d-flex" style="align-items: center;">
                <div class="title" style="font-size: 16px; margin-right: 10px;">
                  Dung lượng: 
                </div>
                <div class="select-swap">
                  <?php 
                    while ($row_swatchelement = mysqli_fetch_array($query_swatchelement)) {
                      ?>
                          <div class="swatchelement" data="<?php echo $row_swatchelement['data'] ?>">
                          <input type="radio" class="variant-1" id="<?php echo $row_swatchelement['id']?>" name="mau" value="<?php echo $row_swatchelement['value'] ?>" onclick="check()">
                          <label for="<?php echo $row_swatchelement['for'] ?>" class="sd"><span>256GB</span></label>
                          </div>
                      <?php
                      }
                  ?>

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
              <h3 class="name__product">Điện thoại iPhone 15 Pro Max 256GB</h3>
              <h3>Chính sách bảo hành đổi trả:  </h3>
                <p>
                Bảo hành có cam kết trong 12 tháng (chỉ áp dụng cho sản phẩm chính, KHÔNG áp dụng cho phụ kiện kèm theo)

                Bảo hành trong vòng 15 ngày (từ lúc Khách hàng mang sản phẩm đến bảo hành đến lúc nhận lại sản phẩm tối đa 15 ngày).
                Sản phẩm không bảo hành lại lần 2 trong 30 ngày kể từ ngày máy được bảo hành xong.
                Nếu TGDD/ĐMX vi phạm cam kết (bảo hành quá 15 ngày hoặc phải bảo hành lại sản phẩm lần nữa trong 30 ngày kể từ lần bảo hành trước), Khách hàng được áp dụng phương thức Hư gì đổi nấy ngay và luôn hoặc Hoàn tiền với mức phí giảm 50%.
                Từ tháng thứ 13 trở đi, không áp dụng bảo hành có cam kết, chỉ áp dụng bảo hành hãng nếu có.
                Hư gì đổi nấy ngay & luôn

                Hư sản phẩm chính: Đổi sản phẩm mới (cùng model, cùng dung lượng, cùng màu sắc) miễn phí tháng đầu tiên, tháng thứ 2 đến tháng 12 chịu phí 10% hoá đơn/tháng. Nếu sản phẩm chính hết hàng thì áp dụng Bảo hành có cam kết hoặc Hoàn tiền với mức phí giảm 50%.
                Hư phụ kiện đi kèm: Đổi miễn phí trong vòng 12 tháng kể từ ngày mua sản phẩm chính bằng hàng phụ kiện TGDĐ/ĐMX đang kinh doanh mới với công năng tương đương. Nếu không có phụ kiện tương đương hoặc Khách hàng không thích thì áp dụng bảo hành hãng
                Lỗi phần mềm không áp dụng, mà chỉ khắc phục lỗi phần mềm.
                Trường hợp Khách hàng muốn đổi full box (nguyên thùng, nguyên hộp): ngoài việc áp dụng mức phí đổi trả thì Khách hàng sẽ trả thêm phí lấy full box tương đương 20% giá trị hóa đơn.
                Hoàn tiền

                Tháng đầu tiên kể từ ngày mua: phí 20% giá trị hóa đơn.
                Tháng thứ 2 đến tháng thứ 12: phí 10% giá trị hóa đơn/tháng.
                </p>
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
                    <?php 
                        while ($row_comment = mysqli_fetch_array($query_comment)) {
                            ?>
                                <div class="comment" style="align-items: center;">
                                <img class="comment-img" src="https://th.bing.com/th/id/R.a36250d2b0911ef05f2089f4b2cd1f66?rik=qPejMXQR5BgMpQ&pid=ImgRaw&r=0" alt="" >
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
                            <?php
                            }
                    ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end product detail -->
      <!-- product relate to -->
      <div class="product__relateto">
        <div class="container">
          <h3 class="product__relateto-heading">Sản phẩm liên quan</h3>
          <div class="row">
          <?php 
            while ($row_relate= mysqli_fetch_array($query_relate)) {
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
              <a href="./ProductDetail.php" class="product__new-item">
                <div class="card" style="width: 100%">
                  <div>
                    <img class="card-img-top" src="https://cdn.tgdd.vn/Products/Images/60/316795/op-lung-magsafe-iphone-15-pro-max-nhua-cung-pc-araree-aero-frame-dark-green-1.jpg" alt="Card image cap">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">
                        Ốp lưng MagSafe iPhone 15 Pro Max Nhựa cứng PC Araree AERO FRAME Chính hãng
                    </h5>
                    <div class="product__price">
                      <p class="card-text price-color product__price-old">648.000 đ</p>
                      <p class="card-text price-color product__price-new">720.000 đ</p>
                    </div>
                    <div class="home-product-item__action">
                      <span class="home-product-item__like home-product-item__like--liked">
                          <i class="home-product-item__like-icon-empty far fa-heart"></i>
                          <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                      </span>
                      <div class="home-product-item__rating">
                          <i class="home-product-item__star--gold fas fa-star"></i>
                          <i class="home-product-item__star--gold fas fa-star"></i>
                          <i class="home-product-item__star--gold fas fa-star"></i>
                          <i class="home-product-item__star--gold fas fa-star"></i>
                          <i class="fas fa-star"></i>
                      </div>
                      <span class="home-product-item__sold">79 đã bán</span>
                    </div>
                    <div class="sale-off">
                      <span class="sale-off-percent">10%</span>
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
          <div class="seemore">
            <a href="./Product.php">Xem thêm</a>
          </div>
        </div>
      </div>
      <!-- end  product relate to-->
 
      <script src="./assets/js/main.js"></script>
      <script src="./assets/js/zoomsl.js"></script>
      <script>
        $(document).ready(function(){
          $(".big-img").imagezoomsl({
            zoomrange: [3, 3]
            
          });
        });
      </script>
<script>
  function fadeInModal()
  {
      $('.alert').fadeIn();   
      $('.overlay1').fadeIn(); 
  }
  function fadeOutModal()
  {
      $('.alert').fadeOut();
      $('.overlay1').fadeOut();
  }
  function fadeout()
  {
      $('.overlay1').fadeOut();
      $('.alert').fadeOut();
  }
  setInterval(fadeOutModal, 7000);
</script>
