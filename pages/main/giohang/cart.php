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
  <?php
  $idCartResult = null;
  if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $sql_get_idCart = "SELECT idCart FROM cart WHERE idUser = $id_user and statusCart = 0";
    $query_get_idCart = mysqli_query($connect, $sql_get_idCart);

    $idCartResult = mysqli_fetch_array($query_get_idCart);

    if ($idCartResult != null) {
      $idCart = $idCartResult['idCart'];
      $sql_cart_detail = "SELECT * FROM cart_detail 
                        inner join products on cart_detail.idProduct = products.idProduct 
                        where idCart = $idCart and (SELECT statusCart from cart where idCart = $idCart) = 0";
      $query_cart_detail = mysqli_query($connect, $sql_cart_detail);
      $num_rows = mysqli_num_rows($query_cart_detail);
    }
  }
  ?>
  <!-- content -->
  <div class="cart">
    <div class="container">
    <div class="topdistance"></div>
      <div class="cart-wrap">
        <div class="cart-content">
          <form action="" class="form-cart" style="padding-left: 12px;">
            <?php
            if ($idCartResult != null && $id_user != null && $num_rows != 0) {
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
                  while ($row_listcart = mysqli_fetch_array($query_cart_detail)) {
                  ?>

                    <div class="row cart-body-row cart-body-row-1" style="align-items: center;">
                      <div class="col-md-11 col-10" style="text-align: center;">
                        <div class="row card-info" style="align-items: center;">
                          <div class="col-md-2 col-12 card-info-img">
                            <a href=""><img class="cart-img" src="./img/product/<?php echo $row_listcart['image'] ?>" alt=""></a>
                          </div>
                          <div class="col-md-3 col-12">
                            <a href="" class="cart-name">
                              <h5><?php echo $row_listcart['name'] ?></h5>
                            </a>
                          </div>
                          <div class="col-md-2 col-12" style="font-size: 16px;">
                            <span><?php echo number_format($row_listcart['sellingPrice']) ?></span>
                          </div>
                          <div class="col-md-3 col-12">
                            <div class="cart-quantity">
                              <?php
                              if ($row_listcart['quantity'] > 1) {
                              ?>
                                <a href="pages/main/giohang/suasoluong.php?tru=<?php echo $row_listcart['idProduct'] ?>">
                                  <input type="button" value="-" class="control">
                                </a>
                              <?php
                              } else {
                              ?>
                                <input type="button" value="-" class="control">
                              <?php
                              }
                              ?>
                              <input readonly type="text" value="<?php echo $row_listcart['quantity'] ?>" class="text-input" id="text_so_luong-<?php echo $row_listcart['idProduct'] ?>">

                              <?php
                              if ($row_listcart['quantity'] < $row_listcart['qttStock']) {
                              ?>
                                <a href="pages/main/giohang/suasoluong.php?cong=<?php echo $row_listcart['idProduct'] ?>">
                                  <input type="button" value="+" class="control">
                                </a>
                              <?php
                              } else {
                              ?>
                                <input type="button" value="+" class="control">
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                          <div class="col-md-2 col-12 hidden-xs" style="font-size: 16px;">
                            <?php
                            $sellingPrice = $row_listcart['sellingPrice'];
                            $quantity = $row_listcart['quantity'];
                            $total = $sellingPrice * $quantity;
                            ?>
                            <span class="txt-price txt_price-<?php echo $row_listcart['idProduct'] ?>"><?php echo number_format($total) ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-1 col-2 text-right">
                        <a href="pages/main/giohang/xoagiohang.php?idP=<?php echo $row_listcart['idProduct'] ?>&idCart=<?php echo $idCart ?>"><i class="fas fa-trash"></i></a>
                      </div>
                    </div>
                  <?php
                  }
                  ?>

                </div>
              </div>
            <?php
            } else {
            ?>
              <h2>Không có sản phẩm nào trong giỏ hàng</h2>
            <?php
            }
            ?>

            <?php
            if ($idCartResult != null && $id_user != null  && $num_rows != 0) {
            ?>

              <div class="cart-body-right">
                <div class="cart-total">
                  <?php
                  $sql_total_cart = "SELECT SUM(sellingPrice * quantity) as total FROM cart_detail inner join products on cart_detail.idProduct = products.idProduct where idCart = $idCart";
                  $query_total_cart = mysqli_query($connect, $sql_total_cart);
                  $total_cart = mysqli_fetch_array($query_total_cart)
                  ?>
                  <label for="">Thành tiền:</label>
                  <span class="total__price"> <?php echo number_format($total_cart['total']) ?> VNĐ</span>
                </div>
                <div class="cart-buttons">
                  <a style="display: block; text-align: center;" href="index.php?quanly=pay" class="chekout">THANH TOÁN</a>
                </div>
              </div>
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
</body>