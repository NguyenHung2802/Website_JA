<section class="content-header">
    <h1>
        Quản lý đơn hàng
    </h1>
</section>

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

<?php
if (isset($_GET['id'])) {
    $idCart = $_GET['id'];
    if ($idCart != null) {
        $sql_cart_detail = "SELECT * FROM cart_detail 
                        inner join products on cart_detail.idProduct = products.idProduct 
                        where idCart = $idCart";
        $query_cart_detail = mysqli_query($connect, $sql_cart_detail);

        $sql_get_cart_order = "SELECT * from cart inner join cart_detail 
                                on cart.idCart = cart_detail.idCart
                                inner join users 
                                on cart.idUser = users.idUser
                                where cart.idCart = $idCart";
        $query_get_cart_order = mysqli_query($connect, $sql_get_cart_order);
        $row_get_cart_order = mysqli_fetch_array($query_get_cart_order);
    }
}
?>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Chi tiết đơn hàng</h3>

            <a style="padding-left: 24px;" href="../admin/index.php?quanly=orders">Quay lại trang trước</a>

        </div>
        <div class="box-body">
            <div class="cart">
                <div class="container">
                    <div class="cart-wrap">
                        <div class="cart-content">
                            <div style="margin-bottom: 12px">
                                <h3>Thông tin đơn hàng</h3>
                            </div>
                            <form action="" class="form-cart" style="display: flex;">

                                <div class="cart-body-left" style="background-color:aliceblue;  padding: 16px; width: 60%">
                                    <div class="cart-heding hidden-xs">
                                        <div class="row cart-row">
                                            <div class="col-11" style="text-align: center;">
                                                <div class="row" style="display: flex; margin: 0 0  12px 0">
                                                    <div style="width: 40%" class="col-5">Sản phẩm</div>
                                                    <div style="width: 12%" class="col-2">Đơn giá</div>
                                                    <div style="width: 29%" class="col-3">Số lượng</div>
                                                    <div style="width: 13%" class="col-2">Thành tiền</div>
                                                </div>
                                            </div>
                                            <div class="col-1"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="cart-body">
                                        <?php
                                        while ($row_listcart = mysqli_fetch_array($query_cart_detail)) {
                                        ?>

                                            <div class="row cart-body-row cart-body-row-1" style="align-items: center; padding: 12px 0">
                                                <div class="col-md-11 col-10" style="text-align: center;">
                                                    <div class="row card-info" style="align-items: center;">
                                                        <div class="col-md-2 col-12 card-info-img">
                                                            <a href=""><img style="width: 80px" class="cart-img" src="./../img/product/<?php echo $row_listcart['image'] ?>" alt=""></a>
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
                                                            <div class="cart-quantity" style="margin-left: 30px;">

                                                                <span><?php echo $row_listcart['quantity'] ?></span>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12 hidden-xs" style="font-size: 16px; padding-left: 36px">
                                                            <?php
                                                            $sellingPrice = $row_listcart['sellingPrice'];
                                                            $quantity = $row_listcart['quantity'];
                                                            $total = $sellingPrice * $quantity;
                                                            ?>
                                                            <span class="txt-price txt_price-<?php echo $row_listcart['idProduct'] ?>"><?php echo number_format($total) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                                <div class="cart-body-right" style="padding-left: 90px;">
                                    <div style="margin-top: 12px">
                                        <label style="font-size: 18px; font-weight: bold; padding-right: 6px" for="">Mã đơn hàng: </label>
                                        <span style="font-size: 18px;">
                                            <?php
                                            echo $row_get_cart_order['idCart'];
                                            ?>
                                        </span>
                                    </div>
                                    <div class="cart-total" style="justify-content: flex-start;margin-top: 12px">
                                        <?php
                                        $sql_total_cart = "SELECT SUM(sellingPrice * quantity) as total FROM cart_detail inner join products on cart_detail.idProduct = products.idProduct where idCart = $idCart";
                                        $query_total_cart = mysqli_query($connect, $sql_total_cart);
                                        $total_cart = mysqli_fetch_array($query_total_cart)
                                        ?>

                                        <?php
                                        $sql_get_user = "SELECT * from cart inner join users on cart.idUser = users.idUser where cart.idCart = $idCart";
                                        $query_get_user = mysqli_query($connect, $sql_get_user);
                                        $row_get_user = mysqli_fetch_array($query_get_user);
                                        ?>

                                        <label style="font-size: 18px; font-weight: bold; padding-right: 6px" for="">Tổng tiền: </label>
                                        <span style="font-size: 18px;" class="total__price"> <?php echo number_format($total_cart['total']) ?> VNĐ</span>
                                    </div>
                                    <div style="margin-top: 12px">
                                        <label style="font-size: 18px; font-weight: bold; padding-right: 6px" for="">Họ tên khách hàng: </label>
                                        <span style="font-size: 18px;">
                                            <?php
                                            echo $row_get_user['fullName'];
                                            ?>
                                        </span>
                                    </div>
                                    <div style="margin-top: 12px">
                                        <label style="font-size: 18px; font-weight: bold; padding-right: 6px" for="">Số điện thoại: </label>
                                        <span style="font-size: 18px;">
                                            <?php
                                            echo $row_get_user['phone'];
                                            ?>
                                        </span>
                                    </div>
                                    <div style="margin-top: 12px">
                                        <label style="font-size: 18px; font-weight: bold; padding-right: 6px" for="">Địa chỉ: </label>
                                        <span style="font-size: 18px;">
                                            <?php
                                            echo $row_get_user['address'];
                                            ?>
                                        </span>
                                    </div>
                                    <div style="margin-top: 12px">

                                        <label style="font-size: 18px; font-weight: bold; padding-right: 6px" for="">Hình thức thanh toán: </label>
                                        <span style="font-size: 18px;">
                                            <?php
                                            echo $row_get_cart_order['payments'];
                                            ?>
                                        </span>
                                    </div>
                                    <div style="margin-top: 12px">

                                        <label style="font-size: 18px; font-weight: bold; padding-right: 6px" for="">Trạng thái: </label>
                                        <span style="font-size: 18px;">
                                            <?php
                                            $status = $row_get_cart_order['statusCart'];
                                            $statusText = '';
                
                                            switch ($status) {
                                                case 1:
                                                    $statusText = 'Đang chờ';
                                                    break;
                                                case 2:
                                                    $statusText = 'Đã hủy';
                                                    break;
                                                case 3:
                                                    $statusText = 'Đang giao hàng';
                                                    break;
                                                case 4:
                                                    $statusText = 'Giao thành công';
                                                    break;
                                                case 5:
                                                    $statusText = 'Giao thất bại';
                                                    break;
                                            }
                                            echo $statusText;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</section>
</div>