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
    <link rel="stylesheet" href="./assets/css/pay.css">
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

    /* Mobile & tablet  */
    @media (max-width: 1023px) {
        .summary {
            display: block;
        }
    }

    /* tablet */
    @media (min-width: 740px) and (max-width: 1023px) {}

    /* mobile */
    @media (max-width: 739px) {}
</style>

<body>
    <div class="overlay hidden"></div>
    <!-- mobile menu -->
    <div class="mobile-main-menu">
        <div class="drawer-header">
            <a href="">
                <div class="drawer-header--auth">
                    <div class="_object">
                        <img src="./assets/img/product/giayxah2.jpg" alt="">
                    </div>
                    <div class="_body">Đăng nhập
                        <br>Nhận nhiều ưu đãi hơn
                    </div>
                </div>
            </a>
        </div>
        <ul class="ul-first-menu">
            <li>
                <a href="">Đăng nhập</a>
            </li>
            <li>
                <a href="" class="abc">Đăng kí</a>
            </li>
        </ul>
        <!-- <ul class="ul-first-menu">
        <li>
          <a href="">Tài khoản của tôi</a>
        </li>
        <li>
          <a href="">Địạ chỉ của tôi</a>
        </li>
        <li>
          <a href="">Đơn mua</a>
        </li>
        <li>
          <a href="" class="list-like-noicte">Danh sách yêu thích</a>
          <span id="header__second__like--notice" class="header__second__like--notice">3</span>
        </li>
        <li>
          <a href="">Đăng xuất</a>
        </li> -->
        </ul>
        <div class="la-scroll-fix-infor-user">
            <div class="la-nav-menu-items">
                <div class="la-title-nav-items">
                    <strong>Danh mục</strong>
                </div>
                <ul class="la-nav-list-items">
                    <li class="ng-scope">
                        <a href="./index.html">Trang chủ</a>
                    </li>
                    <li class="ng-scope">
                        <a href="./intro.html">Giới thiệu</a>
                    </li>
                    <li class="ng-scope ng-has-child1">
                        <a href="./Product.html">Sản phẩm <i class="fas fa-plus cong"></i> <i
                                class="fas fa-minus tru hidden"></i></a>
                        <ul class="ul-has-child1">
                            <li class="ng-scope ng-has-child2">
                                <a href="./Product.html">Tất cả sản phẩm <i class="fas fa-plus cong1"
                                        onclick="hienthi(1,`abc`)"></i> <i class="fas fa-minus tru1 hidden"
                                        onclick="hienthi(1,`abc`)"></i></a>
                                <ul class="ul-has-child2 hidden" id="abc">
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng đá</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Chạy</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Cầu lông</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng rổ</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Quần vợt</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bơi lội</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">GOLF</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="ng-scope ng-has-child2">
                                <a href="./Product.html">Quần áo <i class="fas fa-plus cong2"
                                        onclick="hienthi(2,`abc2`)"></i> <i class="fas fa-minus tru2 hidden"
                                        onclick="hienthi(2,`abc2`)"></i></a>
                                <ul class="ul-has-child2 hidden" id="abc2">
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng đá</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Chạy</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Cầu lông</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng rổ</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Quần vợt</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bơi lội</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">GOLF</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="ng-scope ng-has-child2">
                                <a href="./Product.html">Già dép<i class="fas fa-plus cong3"
                                        onclick="hienthi(3,`abc3`)"></i> <i class="fas fa-minus tru3 hidden"
                                        onclick="hienthi(3,`abc3`)"></i></a>
                                <ul class="ul-has-child2 hidden" id="abc3">
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng đá</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Chạy</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Cầu lông</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng rổ</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Quần vợt</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bơi lội</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">GOLF</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="ng-scope ng-has-child2">
                                <a href="./Product.html">Phụ kiện <i class="fas fa-plus cong4"
                                        onclick="hienthi(4,`abc4`)"></i> <i class="fas fa-minus tru4 hidden "
                                        onclick="hienthi(4,`abc4`)"></i></a>
                                <ul class="ul-has-child2 hidden" id="abc4">
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng đá</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Chạy</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Cầu lông</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bóng rổ</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Quần vợt</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">Bơi lội</a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="./Product.html">GOLF</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="ng-scope">
                        <a href="./news.html">Tin tức</a>
                    </li>
                    <li class="ng-scope">
                        <a href="./contact.html">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="mobile-support">
            <li>
                <div class="drawer-text-support">Hỗ trợ</div>
            </li>
            <li>
                <i class="fas fa-phone-square-alt footer__item-icon">HOTLINE: </i>
                <a href="tel:19006750">19006750</a>
            </li>
            <li>
                <i class="fas fa-envelope-square footer__item-icon">Email: </i>
                <a href="mailto:support@sapo.vn">support@gmail.vn</a>
            </li>
        </ul>
    </div>
    <!-- end mobile menu -->
   
    <div class="content">
        <div class="wrap">
            <div class="container">
                <form action="">
                    <div class="row">
                        <div class="summary col-lg-6 col-12 hidden">
                            <div class="summary-heading">
                                <div class="summary-heading-title">
                                    <h4>Thông tin đơn hàng</h4>
                                </div>
                                <div class="summary-heading-price">
                                    <h4>3.000.000 <i class="fas fa-chevron-down"
                                            style="margin-left: 20px;margin-right: 5px;"></i></h4>
                                </div>
                            </div>
                            <?php
                            $sql_order_detail ="SELECT * FROM order_detail innder join cart_detail where idCart = 1 ";            
                            $query_order_detail = mysqli_query($connect, $sql_order_detail);             
                            ?>
                            <div class="summary-content hidden">
                            <?php
                                while ($row_listorder = mysqli_fetch_array($query_order_detail)) {
                                    ?>
                                <div class="sliderbar">
                                    <div class="sliderbar-content">
                                        <div class="row row-sliderbar">
                                            <div class="col-6">
                                                <img src="./assets/img/product/stansmith.jpg" alt="" width="80%">
                                                <span class="notice">3</span>
                                            </div>
                                
                                            <div class="col-6">
                                                <h5><?php echo $row_listorder['name']?></h5>
                                                <span><?php echo $row_listorder['sellingPrice']?></span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?> 
                                    </div>
                                    
                                    <div class="slider-footer">
                                        <div class="subtotal">
                                            <div class="row row-sliderbar-footer">
                                                <div class="col-6"><span>Tạm tính:</span></div>
                                                <div class="col-6 text-right"><span>725,000₫</span></div>
                                            </div>
                                            <div class="row row-sliderbar-footer">
                                                <div class="col-6"><span>Phí vận chuyển</span></div>
                                                <div class="col-6 text-right"><span>625,000₫</span></div>
                                            </div>
                                        </div>
                                        <div class="total">
                                            <div class="row row-sliderbar-footer">
                                                <div class="col-6"><span>Tổng cộng:</span></div>
                                                <div class="col-6 text-right"><span>625,000₫</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="main">
                                <div class="main-header">
                                    <a href="">
                                        <h1>P&T SHOP</h1>
                                    </a>
                                </div>
                                <div class="main-content">
                                    <div class="main-title">
                                        <h2>Thông tin giao hàng</h2>
                                    </div>
                                    <div class="main-customer-info">
                                        <div class="main-customer-info-img">
                                            <img src="./assets/img/product/noavatar.png" alt="" width="60px"
                                                height="60px">
                                        </div>
                                        <div class="main-customer-info-logged">
                                            <p class="main-customer-info-logged-paragraph">Quốc Trung
                                                (nguyenquoctrung@gmail.com)</p>
                                            <a href="">Đăng xuất</a>
                                        </div>
                                    </div>
                                    <div class="fieldset">
                                        <div class="fieldset-address form-group">
                                            <label for="diachi" class="form-label" for="">Địa chỉ</label>
                                            <input id="diachi" type="text" class="form-control">
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="fieldset-name form-group">
                                            <label for="hoten" class="form-label" for="">Họ tên</label>
                                            <input id="hoten" type="text" class="form-control">
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="fieldset-phone form-group">
                                            <label for="sdt" class="form-label" for="">Số điện thoại</label>
                                            <input id="sdt" type="text" class="form-control">
                                            <span class="form-message"></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="main-footer">
                                    <div class="continue">
                                        <a>
                                            <i class="fi-rs-angle-left"></i>
                                            Giỏ hàng
                                        </a>
                                    </div>
                                    <div class="pay">
                                        <button class="btn-pay form-submit">Thanh toán</button>
                                    </div>
            </div>
        </div>
    </div>
    <?php
    $sql_order_detail ="SELECT * FROM order_detail inner join cart_detail inner join products where idCart = 1 ";            
    $query_order_detail = mysqli_query($connect, $sql_order_detail);    
    ?>    
    <div class="col-lg-6 col-12 hidden-sm hidden-xs" style="background-color:#f3f3f3;">
    <?php
         while ($row_listorder = mysqli_fetch_array($query_order_detail)) {
         ?>
        <div class="sliderbar">
            <div class="sliderbar-header">
                <h2>Thông tin đơn hàng</h2>
            </div>
            <div class="sliderbar-content">
                <div class="row row-sliderbar">
                    <div class="col-4">
                        <img src="./assets/img/product/stansmith.jpg" alt="" width="80%">
                        <span class="notice">3</span>
                    </div>
                    
                    <div class="col-6">
                        <h5><?php echo $row_listorder['name']?></h5>
                    </div>
                    <div class="col-2">
                        <span><?php echo $row_listorder['sellingPrice']?>đ</span>
                    </div>
                </div>
            </div>
            <?php
        }
            ?>
            <div class="slider-footer">
                <div class="subtotal">
                    <div class="row row-sliderbar-footer">
                        <div class="col-6"><span>Tạm tính:</span></div>
                        <div class="col-6 text-right"><span>625,000₫</span></div>
                    </div>
                    <div class="row row-sliderbar-footer">
                        <div class="col-6"><span>Phí vận chuyển</span></div>
                        <div class="col-6 text-right"><span>625,000₫</span></div>
                    </div>
                </div>
                <div class="total">
                    <div class="row row-sliderbar-footer">
                        <div class="col-6"><span>Tổng cộng:</span></div>
                        <div class="col-6 text-right"><span>625,000₫</span></div>
                    </div>
                </div>
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
<script src="./assets/js/validator.js"></script>
<script src="./assets/js/main.js"></script>
<script>
    Validator({
        form: '#form-2',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#hoten', 'Vui lòng nhập tên đầy đủ'),
            Validator.isRequired('#sdt'),
            Validator.isRequired('#diachi'),
            Validator.isEmail('#email'),
            Validator.isRequired('#password'),
            Validator.minLength('#password', 6),
            Validator.isRequired('#password_confirmation'),
            // Validator.isRequired('input[name="gender"]'),
            // Validator.isConfirmed('#password_confirmation', function(){
            //   return document.querySelector('#form-1 #password').value;
            // }, 'Mật khẩu nhập lại không chính xác')
        ],
        onSubmit: function (data) {
            // call api
            console.log(data);
        }
    });
</script>

</html>