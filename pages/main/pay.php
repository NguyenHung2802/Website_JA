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

    <div class="content">
        <div class="wrap">
            <div class="container">
                <form action="">
                    <div class="row">
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
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThfniC93R4LVY3q47jnybdM21z-XuIsx2rMQ&usqp=CAU" alt="" width="60px" height="60px">
                                        </div>
                                        <div class="main-customer-info-logged">
                                            <p class="main-customer-info-logged-paragraph mt-3">Tuấn Thành<br />
                                                (tuanthanh@gmail.com)</p>
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
                                        <a href="index.php?quanly=cart">
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
                        <div class="col-lg-6 col-12 hidden-sm hidden-xs" style="background-color:#f3f3f3;">
                            <div class="sliderbar">
                                <div class="sliderbar-header">
                                    <h2>Thông tin đơn hàng</h2>
                                </div>
                                <div class="slider-footer">
                                    <div class="subtotal">
                                        <?php
                                        $sql_cart_detail = "SELECT SUM(quantity * sellingPrice) FROM cart_detail inner join products on cart_detail.idProduct = products.idProduct WHERE idCart = 1";
                                        $query = mysqli_query($connect, $sql_cart_detail);
                                        $tongTien = mysqli_fetch_array($query);
                                        ?>
                                        <div class="row row-sliderbar-footer">
                                            <div class="col-6"><span>Tạm tính:</span></div>
                                            <div class="col-6 text-right"><span>625,000₫</span></div>
                                        </div>
                                        <div class="row row-sliderbar-footer">
                                            <div class="col-6"><span>Phí vận chuyển</span></div>
                                            <div class="col-6 text-right"><span>0₫</span></div>
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
        ],
        onSubmit: function(data) {
            console.log(data);
        }
    });
</script>