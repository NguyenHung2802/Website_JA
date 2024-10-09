<style>
    .wrap_btn_pagination {
        display: flex;
    }

    .item_btn_pagination {
        text-align: center;
        height: 40px;
        width: 40px;
        line-height: 40px;
        background-color: #ccc;
        margin: 0 4px;
    }

    .link_pagination:hover {
        text-decoration: none;
        background-color: aquamarine;
    }
</style>
<?php
$currentPage = $_GET['page'];

// Số lượng sản phẩm của 1 trang
$quantityOfAPage = 8;

$offset = ($currentPage - 1) * $quantityOfAPage;

if (isset($_GET['name'])) {
    $groupName = $_GET['name'];
    $titlePage = 'Danh mục sản phẩm: ' . $groupName;
    if (isset($_GET['order'])) {
        $order = $_GET['order'];
        $sql_dssp = "SELECT DISTINCT * FROM products WHERE byCompany = '$groupName' Order by sellingPrice $order LIMIT $quantityOfAPage OFFSET $offset";
        $url = 'nhomsp&name=' . $groupName . "&order=" . $order . "&page=";
        $sql_get_count = "SELECT COUNT(*) AS record_count FROM products WHERE byCompany = '$groupName' ORDER BY sellingPrice $order";
    } else {
        $sql_dssp = "SELECT DISTINCT * FROM products WHERE byCompany = '$groupName' LIMIT $quantityOfAPage OFFSET $offset";
        $url = 'nhomsp&name=' . $groupName . "&page=";
        $sql_get_count = "SELECT COUNT(*) AS record_count FROM products where byCompany =  '$groupName'";
    }
    $query_dssp = mysqli_query($connect, $sql_dssp);
    $query_get_count = mysqli_query($connect, $sql_get_count);
}

if (isset($_GET['list'])) {
    $groupName = $_GET['list'];
    if ($groupName == 'NEW') {
        $titlePage = 'Danh sách sản phẩm mới';
    } else {
        $titlePage = 'Danh sách sản phẩm bán chạy';
    }
    if (isset($_GET['order'])) {
        $order = $_GET['order'];
        $sql_dssp = "SELECT DISTINCT * FROM products WHERE tag = '$groupName' Order by sellingPrice $order LIMIT $quantityOfAPage OFFSET $offset";
        $url = 'nhomsp&list=' . $groupName . "&order=" . $order . "&page=";
        $sql_get_count = "SELECT COUNT(*) AS record_count FROM products where tag =  '$groupName' Order by sellingPrice $order";
    } else {
        $sql_dssp = "SELECT DISTINCT * FROM products WHERE tag =  '$groupName' LIMIT $quantityOfAPage OFFSET $offset";
        $url = 'nhomsp&list=' . $groupName . "&page=";
        $sql_get_count = "SELECT COUNT(*) AS record_count FROM products where tag =  '$groupName'";
    }
    $query_dssp = mysqli_query($connect, $sql_dssp);
    $query_get_count = mysqli_query($connect, $sql_get_count);
}

if (isset($_GET['Pmax']) || isset($_GET['Pmin'])) {
    $Pmax = isset($_GET['Pmax']) == null ? 1000000000 : $_GET['Pmax'];
    $Pmin = $_GET['Pmin'];
    $titlePage = 'Danh sách sản phẩm';

    if (isset($_GET['order'])) {
        $order = $_GET['order'];
        $sql_dssp = "SELECT DISTINCT * FROM products WHERE sellingPrice > $Pmin AND sellingPrice < $Pmax ORDER BY sellingPrice $order LIMIT $quantityOfAPage OFFSET $offset";
        $url = 'nhomsp&Pmax=' . $Pmax . "&Pmin=" . $Pmin . "&order=" . $order . "&page=";
        $sql_get_count = "SELECT COUNT(*) AS record_count FROM products where sellingPrice > $Pmin AND sellingPrice < $Pmax";
    } else {
        $sql_dssp = "SELECT DISTINCT * FROM products WHERE sellingPrice > $Pmin AND sellingPrice < $Pmax LIMIT $quantityOfAPage OFFSET $offset";
        $url = 'nhomsp&Pmax=' . $Pmax . "&Pmin=" . $Pmin . "&page=";
        $sql_get_count = "SELECT COUNT(*) AS record_count FROM products where sellingPrice > $Pmin AND sellingPrice < $Pmax";
    }

    $query_dssp = mysqli_query($connect, $sql_dssp);
    $query_get_count = mysqli_query($connect, $sql_get_count);
}


// Số lượng bản ghi product -> phục vụ phân trang
$count = mysqli_fetch_assoc($query_get_count);

// Số lượng trang cần có
$count1 = $count['record_count'];
$numberPage = round($count1 / $quantityOfAPage) < ($count1 / $quantityOfAPage) ? (round($count1 / $quantityOfAPage) + 1) : round($count1 / $quantityOfAPage);

?>

<div class="container">

    <div class="product__yml">
        <div style="display: flex; align-items: center; justify-content: space-between; ">
            <h3 class="product__yml title-product"><?php echo $titlePage ?></h3>
            <div style="font-size: 16px;">
                <span>Sắp xếp theo:</span>
                <select id="sapxepSelect" style="margin: 0 12px; padding: 8px">
                    <option value="DEFAULT">---Mặc định---</option>
                    <option value="ASC">Thấp đến cao</option>
                    <option value="DESC">Cao đến thấp</option>
                </select>
            </div>
        </div>
        <div class="row">
            <?php
            while ($row_dssp = mysqli_fetch_array($query_dssp)) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                    <a href="index.php?quanly=productDetail&id=<?php echo $row_dssp['idProduct'] ?>" class="product__new-item">
                        <div class="card" style="width: 100%">
                            <div>
                                <img class="card-img-top" src="./img/product/<?php echo $row_dssp['image'] ?>" alt="Card image cap">
                                <form action="" class="hover-icon hidden-sm hidden-xs">
                                    <input type="hidden">
                                    <a href="pages/main/giohang/themgiohang.php?idP=<?php echo $row_dssp['idProduct'] ?>&qtt=1" class="btn-add-to-cart" title="Thêm vào giỏ hàng">
                                        <i class="fas fa-cart-plus"></i>
                                    </a>
                                    <a href="index.php?quanly=productDetail&id=<?php echo $row_dssp['idProduct'] ?>" class="quickview" title="Xem nhanh">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </form>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title custom__name-product">
                                    <?php echo $row_dssp['name'] ?>
                                </h5>
                                <div class="product__price">
                                    <p class="card-text price-color product__price-old"><?php echo number_format($row_dssp['costPrice']) ?> đ</p>
                                    <p class="card-text price-color product__price-new"><?php echo number_format($row_dssp['sellingPrice']) ?> đ</p>
                                </div>
                                <div class="home-product-item__action">
                                    <span class="home-product-item__like home-product-item__like--liked">
                                        <?php
                                        $idProduct_spnew = $row_dssp['idProduct'];
                                        $row_product_favourite_spnew['countSP'] = null;
                                        if (isset($_SESSION['id_user'])) {
                                            $sql_product_favourite_spnew = "SELECT COUNT(*) as countSP FROM favorite_products WHERE idProduct = $idProduct_spnew and idUser = $id_user";
                                            $query_product_favourite_spnew = mysqli_query($connect, $sql_product_favourite_spnew);
                                            $row_product_favourite_spnew = mysqli_fetch_array($query_product_favourite_spnew);
                                        }
                                        if ($row_product_favourite_spnew['countSP'] > 0 && $row_product_favourite_spnew['countSP'] != null) {
                                        ?>
                                            <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                            <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/xoasanphamyeuthich.php?id=' . $row_dssp['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                                                <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                            <a href="<?php echo isset($_SESSION['id_user']) ? 'pages/main/sanphamyeuthich.php?id=' . $row_dssp['idProduct'] : 'javascript:alert(\'Bạn cần đăng nhập để sử dụng chức năng này!\');' ?>">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        <?php

                                        } ?>
                                    </span>

                                    <?php
                                    $idProduct = $row_dssp['idProduct'];
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
<div class="shoesnews__all">
    <div class="wrap_btn_pagination">
        <?php
        $currentPage = max(1, $currentPage);
        $startPage = max(1, $currentPage - 1);
        $endPage = min($startPage + 2, $numberPage);

        if ($currentPage > 1) {
            echo '<a class="link_pagination item_btn_pagination" href="index.php?quanly=' . $url . '1">&lt;&lt;</a>';
        }

        for ($i = $startPage; $i <= $endPage; $i++) {
            $activeClass = ($i == $currentPage) ? 'active_pagination' : '';
            echo '<a class="link_pagination item_btn_pagination ' . $activeClass . '" href="index.php?quanly=' . $url . $i . '">' . $i . '</a>';
        }

        if ($currentPage < $numberPage) {
            echo '<a class="link_pagination item_btn_pagination" href="index.php?quanly=' . $url  . $numberPage . '">&gt;&gt;</a>';
        }
        ?>
    </div>
</div>

<script>
    var sapxepSelect = document.getElementById("sapxepSelect");

    var selectedOption = localStorage.getItem('selectedOption');

    if (selectedOption) {
        sapxepSelect.value = selectedOption;
    }

    sapxepSelect.addEventListener("change", function() {
        var selectedValue = sapxepSelect.value;

        localStorage.setItem('selectedOption', selectedValue);

        var currentUrl = window.location.href;

        var orderParamIndex = currentUrl.indexOf('&order=');

        if (orderParamIndex !== -1) {
            var orderParam = currentUrl.substring(orderParamIndex);

            var baseUrl = currentUrl.substring(0, orderParamIndex);
            var newUrl;
            if (selectedValue === "ASC") {
                newUrl = baseUrl + '&order=ASC';
            } else if (selectedValue === "DEFAULT") {
                newUrl = baseUrl;
            } else if (selectedValue === "DESC") {
                newUrl = baseUrl + '&order=DESC';
            }
        } else {
            var separator = currentUrl.includes('?') ? '&' : '?';
            if (selectedValue === "ASC") {
                newUrl = currentUrl + separator + 'order=ASC';
            } else if (selectedValue === "DEFAULT") {
                newUrl = currentUrl;
            } else if (selectedValue === "DESC") {
                newUrl = currentUrl + separator + 'order=DESC';
            }
        }

        window.location.href = newUrl;
    });
</script>