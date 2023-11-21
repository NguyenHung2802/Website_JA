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
    .owl-item {
        width: 396px;
        padding: 16px 0;
    }

    .card:hover .hover-icon {
        display: none;
    }
}

/* mobile */
@media (max-width: 739px) {
    .owl-item {
        float: unset;
        padding: 16px 0;
    }

    .card:hover .hover-icon {
        display: none;
    }
}
</style>
<?php
    // $sql_get_like = "SELECT * FROM favorite_products WHERE idUser = 1";
    // $query_get_like = mysqli_query($connect, $sql_get_like);
    // $favorite = mysqli_fetch_array($query_get_like);
    $sql_get_img = "SELECT * FROM favorite_products inner join products on favorite_products.idProduct = products.idProduct WHERE idUser = 1 ";
    $query_get_img = mysqli_query($connect, $sql_get_img);
?>


<body>

    <!-- content -->
    <div class="listlike">
        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                    <?php
              while($product = mysqli_fetch_array($query_get_img)) {
                ?>
                    <a href="./ProductDetail.html" class="product__new-item">

                        <div class="card" style="width: 100%">

                            <div>

                                <img class="card-img-top" src="<?php echo $product['image'] ?>" alt="Card image cap">

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
                                    <?php echo $product['name']?></p>
                                </h5>
                                <div class="product__price">
                                    <p class="card-text price-color product__price-old">
                                        <?php echo $product['costPrice']?>đ</p>
                                    <p class="card-text price-color product__price-new">
                                        <?php  echo $product['sellingPrice']?>đ</p>
                                </div>
                                <div class="home-product-item__action">
                                    <?php 
                                    
                                    $sql_rate = "SELECT * FROM feedbacks inner join users on users.idUser = feedbacks.idUser WHERE idProduct = 1";
                                    $query_rate = mysqli_query($connect, $sql_rate);
                                    ?>
                                    <span class="home-product-item__like home-product-item__like--liked">
                                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                    </span>

                                    <?php
                                     while ($row_listrate = mysqli_fetch_array($query_rate)){
                                     $rate = $row_listrate['Rate'];?>
                                    <div class="home-product-item__rating">
                                        <?php
                                        for ($i = 0; $i < 5; $i++) {
                                        $starClass = ($i < $rate ? "home-product-item__star--gold" : "");
                                        ?>
                                        <i class="fas fa-star <?= $starClass ?>"></i>
                                        <?php
                                        }
                                        ?>
                                        <?php 
                                    }
                                    ?>
                                    </div>
                                    <!-- <span class="home-product-item__sold">79 đã bán</span> -->
                                </div>
                                <div class="sale-off">
                                    <span class="sale-off-percent">12%</span>
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
    <!-- end content -->
</body>
<script src="./assets/js/main.js"></script>

</html>