<?php
        if(isset($_SESSION['cart'])){

            
        }

?>
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

  .control-quantity{
    text-decoration: none;
    border: 1px solid #333;
    height: 30px;
    width: 35px;
    cursor: pointer;
    color: #333;
    font-size: 82px;
    display: block;
    box-sizing: border-box;
  }
  .control-quantity:hover{
    text-decoration: none;
    background-color: #333;
    color: #ffffff;
  }

  /* Mobile & tablet  */
  @media (max-width: 1023px) {}

  /* tablet */
  @media (min-width: 740px) and (max-width: 1023px) {
    .cart-wrap {
      padding-top: 8px;
      padding-bottom: 46px
    }

    .cart-body-left {
      width: 100%;
    }

    .cart-body-right {
      margin-top: 8px;
      width: 100%;
      padding: 16px;
    }
  }

  /* mobile */
  @media (max-width: 739px) {
    .cart-wrap {
      padding-top: 8px;
      padding-bottom: 46px;
    }

    .cart-body-left {
      width: 100%;
    }

    .cart-body-right {
      margin-top: 8px;
      width: 100%;
      padding: 16px;
    }

    .cart-body-row {
      flex-direction: row;
      /* margin-left: -12px;
    margin-right: -12px; */
    }

    .card-info {
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    .card-info-img {
      grid-row: span 3;
    }

    .cart-quantity {
      margin-top: 5px;
    }
  }
</style>

<body>
  
  <!-- content -->
  <div class="cart">
    <div class="container">
      <div class="cart-wrap">
        <div class="cart-content">
          <form action="" class="form-cart">
            <?php
              if(isset($_SESSION['cart'])){

              
            ?>
            <div class="cart-body-left">
              <div class="cart-heding hidden-xs">
                <div class="row cart-row">
                  <div class="col-11" style="text-align: center;">
                    <div class="row">
                      <div class="col-5">Sản phẩm</div>
                      <div class="col-2">Đơn giá</div>
                      <div class="col-3">Số lượng</div>
                      <div class="col-2">Thành tiền</div>
                    </div>
                  </div>
                  <div class="col-1"></div>
                </div>
              </div>
              <div class="cart-body">
                <?php
                  
                    $i = 0;
                    $tongtien = 0;
                    foreach($_SESSION['cart'] as $cart_item){
                      $thanhtien = $cart_item['soluong'] * $cart_item['sellingPrice'];
                      $tongtien+=$thanhtien;
                      $i++;  
                ?>

                  <div class="row cart-body-row cart-body-row-1" style="align-items: center;">
                    <div class="col-md-11 col-10" style="text-align: center;">
                      <div class="row card-info" style="align-items: center;">
                        <div class="col-md-2 col-12 card-info-img">
                          <a href=""><img class="cart-img" src="<?php echo $cart_item['image'] ?>" alt=""></a>
                        </div>
                        <div class="col-md-3 col-12">
                          <a href="index.php?quanly=productDetail&id=<?php echo $cart_item['id'] ?>" class="cart-name">
                            <h5><?php echo $cart_item['name'] ?></h5>
                          </a>
                        </div>
                        <div class="col-md-2 col-12" style="font-size: 16px;">
                          <span><?php echo number_format($cart_item['sellingPrice'],0,',','.')  ?></span>
                        </div>
                        <div class="col-md-3 col-12">
                          <div class="cart-quantity">
                            <!-- <input type="button" value="-" class="control"> -->
                            <a class="control-quantity" href="pages/main/suagiohang.php?tru=<?php echo $cart_item['id']?>">-</a>
                            <input type="text" value="<?php echo $cart_item['soluong'] ?>" class="text-input">
                            <!-- <input type="button" value="+" class="control"> -->
                            <a class="control-quantity" href="pages/main/suagiohang.php?cong=<?php echo $cart_item['id']?>">+</a>
                          </div>
                        </div>
                        <div class="col-md-2 col-12 hidden-xs" style="font-size: 16px;">
                          <?php
                          $sellingPrice = $cart_item['sellingPrice'];
                          $quantity = $cart_item['soluong'];
                          $total = $sellingPrice * $quantity;
                          ?>
                          <span class="txt-price txt_price-<?php echo $cart_item['id'] ?>"><?php echo number_format($total,0,',','.')  ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1 col-2 text-right">
                      <!-- <a onclick="xoa(1)"><i class="fas fa-trash"></i></a> -->
                      <a href="pages/main/xoagiohang.php?xoa=<?php echo $cart_item['id']?>"><i class="fas fa-trash"></i></a>
                    </div>
                  </div>
                <?php
                    }
                ?>
               
                
              </div>
            </div>
            <div class="cart-body-right">
              <div class="cart-total">
                <label for="">Thành tiền:</label>
                <span class="total__price"><?php echo number_format($tongtien,0,',','.') ?></span>
              </div>
              <div class="cart-buttons">
                <a style="display: block; text-align: center;" href="index.php?quanly=pay" class="chekout">THANH TOÁN</a>
              </div>
            </div>
            <?php
                  }else{

                  
                
                ?>
                <h3>Chưa có sản phẩm trong giỏ hàng</h3>
                <?php
                  }
                ?>
            <div class="cart-footer">
              
              <div class="row cart-footer-row">
                <div class="col-1"></div>
                <div class="col-11 continue">
                  <a href="index.php">
                    <i class="fas fa-chevron-left"></i>
                    Tiếp tục mua sắm
                  </a>
                </div>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script>
    // function tongTien() {
    //   var priceProducts = document.querySelectorAll(".txt-price");
    //   var totalPrice = document.querySelector(".total__price");
    //   var tongTien = 0;
    //   priceProducts.forEach(element => {
    //     tongTien += parseInt(element.textContent);
    //   });
    //   totalPrice.innerHTML = tongTien + ' đ';
    // };
    // tongTien();

    function tru(productId, sellingPrice) {
      var inputElement = document.getElementById("text_so_luong-" + productId);
      var price = document.querySelector(".txt_price-" + productId);
      var currentValue = parseInt(inputElement.value, 10);

      if (currentValue > 1) {
        inputElement.value = currentValue - 1;
        price.innerHTML = sellingPrice * (currentValue - 1);
        tongTien();
      }
    }

    function cong(productId, sellingPrice) {
      var inputElement = document.getElementById("text_so_luong-" + productId);
      var price = document.querySelector(".txt_price-" + productId);
      var currentValue = parseInt(inputElement.value, 10);

      inputElement.value = currentValue + 1;
      price.innerHTML = sellingPrice * (currentValue + 1);
      tongTien();
    }
  </script>
</body>