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
<?php
$id_user = $_SESSION['id_user'];

$sql_get_idCart = "SELECT idCart FROM cart WHERE idUser = $id_user and statusCart = 0";
$query_get_idCart = mysqli_query($connect, $sql_get_idCart);
$idCartResult = mysqli_fetch_array($query_get_idCart);
$idCart = $idCartResult['idCart'];

$sql_total_cart = "SELECT SUM(sellingPrice * quantity) as total FROM cart_detail inner join products on cart_detail.idProduct = products.idProduct where idCart = $idCart";
$query_total_cart = mysqli_query($connect, $sql_total_cart);
$total_cart = mysqli_fetch_array($query_total_cart);

$sql_get_user = "SELECT * FROM users WHERE idUser = $id_user";
$query_get_user = mysqli_query($connect, $sql_get_user);
$row_user = mysqli_fetch_array($query_get_user);

if (isset($_POST['thanhToan'])) {
    $currentDate = date("Y-m-d");
    $sql_pay = "UPDATE cart SET payments = 'Thanh toán khi nhận hàng.', statusCart = 1, createdAt = '$currentDate' WHERE idUser = $id_user and statusCart = 0";
    $query_pay = mysqli_query($connect, $sql_pay);

    $sql_get_cart_detail = "SELECT idProduct, quantity from cart_detail where idCart = $idCart";
    $query_get_cart_detail = mysqli_query($connect, $sql_get_cart_detail);

    while ($row_get_cart_detail = mysqli_fetch_array($query_get_cart_detail)) {
        $idProduct1 = $row_get_cart_detail['idProduct'];
        $quantity1 = $row_get_cart_detail['quantity'];

        $sql_update_sellNum = "UPDATE products
        SET sellNumber = (sellNumber + $quantity1) where idProduct = $idProduct1";

        $query_update_sellNum = mysqli_query($connect, $sql_update_sellNum);
    }

    echo "<script>
      alert('Đặt hàng thành công!')
      location.href = 'index.php'
    </script>";
}
?>

<body>
    <div class="overlay hidden"></div>

    <div class="content">
        <div class="wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="main">
                            <form action="momoPayment.php" method="POST" enctype="application/x-www-form-urlencoded" class="myForm">
                                <input type="hidden" name="totalCart" value="<?php echo number_format($total_cart['total']) ?>">
                                <div class="main-content">
                                    <div class="d-flex justify-content-between">
                                        <div class="main-title mt-4">
                                            <h2>Thông tin giao hàng</h2>
                                        </div>
                                        <div class="mt-4">
                                            <i style="font-size: 16px;" class="fa fa-edit"></i>
                                            <a href="index.php?quanly=thongtin&by=pay">
                                                Thay đổi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="fieldset">
                                        <div class="fieldset-name form-group">
                                            <label for="hoten" class="form-label" for="">Họ tên</label>
                                            <input id="hoten" type="text" class="form-control" readonly value="<?php echo $row_user['fullName'] ?>">
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="fieldset-address form-group">
                                            <label for="diachi" class="form-label" for="">Địa chỉ</label>
                                            <input id="diachi" readonly type="text" class="form-control" value="<?php echo $row_user['address'] ?>">
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="fieldset-phone form-group">
                                            <label for="sdt" class="form-label" for="">Số điện thoại</label>
                                            <input id="sdt" type="text" class="form-control" value="<?php echo $row_user['phone'] ?>" readonly>
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-footer mb-4" style="flex-direction: column; align-items: flex-start;">
                                    <div class="d-flex">
                                        <div class="pay mr-4">
                                            <button name="thanhToan" onclick="handlePayOff()" type="submit" value="Thanh toán" class="btn-pay form-submit">Thanh toán</button>
                                        </div>
                                        <div class="pay ml-4">
                                            <button name="thanhToanMomo" onclick="handleSubmit()" type="submit" value="Thanh toán" class="btn-pay form-submit">Thanh toán MOMO</button>
                                        </div>
                                    </div>
                                    <div class="continue mt-4">
                                        <a href="index.php?quanly=cart">
                                            <i class="fi-rs-angle-left"></i>
                                            Giỏ hàng
                                        </a>
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
                                        <div class="col-6 text-right"><span><?php echo number_format($total_cart['total']) ?> VNĐ</span></div>
                                    </div>
                                    <div class="row row-sliderbar-footer">
                                        <div class="col-6"><span>Phí vận chuyển</span></div>
                                        <div class="col-6 text-right"><span>0₫</span></div>
                                    </div>
                                </div>
                                <div class="total">
                                    <div class="row row-sliderbar-footer">
                                        <div class="col-6"><span>Tổng cộng:</span></div>
                                        <div class="col-6 text-right"><span><?php echo number_format($total_cart['total']) ?> VNĐ</span></div>
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
    </div>
</body>
<script>
    var myForm = document.querySelector(".myForm");

    function handlePayOff() {
        myForm.action = "";
    }

    function handleSubmit() {
        myForm.action = "pages/main/momoPayment.php"
    }
</script>