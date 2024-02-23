<style>
    .wrap_btn_pagination {
        display: flex;
    }

    .wrap_btn_pagination .link_pagination{
        font-size: 17px !important;
        border-radius: 50%;
    }

    .item_btn_pagination {
        text-align: center;
        height: 40px;
        width: 40px;
        padding: 6px;
        line-height: 40px;
        background-color: #ccc;
        margin: 0 4px;
    }

    .link_pagination:hover {
        text-decoration: none;
        color: #FFFFFF !important;
        background-color: #000;
        opacity: 0.2;
    }

    .active_pagination {
        color: #FFFFFF !important;
        background-color: #000 !important;

    }
</style>
<?php
// Trang muốn lấy
$currentPage = $_GET['page'];

// Số lượng sản phẩm của 1 trang
$quantityOfAPage = 4;

// Limit và offset dùng phân trang
$offset = ($currentPage - 1) * $quantityOfAPage;
$limit = $quantityOfAPage;

// Xử lý url với search và xem tất cả sản phẩm
$url = '';

// Xử lý khi muốn xem sp tìm kiếm hoặc xem all sp
if (isset($_GET['quanly']) && isset($_GET['page']) && isset($_GET['search'])) {
    $search = !empty($_POST['search']) ? $_POST['search'] : $_GET['search'];
    $titlePage = 'Tìm kiếm sản phẩm: ' . $search;
    $sql_dssp = "SELECT DISTINCT * FROM products WHERE name LIKE '%$search%' LIMIT $limit OFFSET $offset";
    $url = "showAllProduct&search=" . $search . "&page=";
} else if (isset($_GET['quanly']) && isset($_GET['page'])) {
    $titlePage = 'Tất cả sản phẩm';
    $sql_dssp = "SELECT DISTINCT * FROM products LIMIT $limit
    OFFSET $offset";
    $url = "showAllProduct&page=";
}

$query_dssp = mysqli_query($connect, $sql_dssp);

if ($url == "showAllProduct&page=")
    $sql_get_count = "SELECT COUNT(*) AS record_count FROM products";
else
    $sql_get_count = "SELECT COUNT(*) AS record_count FROM products WHERE name LIKE '%$search%'";

// Lấy  ra số trang tối đa cần dùng khi search hoặc xem tất cả sp
$query_get_count = mysqli_query($connect, $sql_get_count);

// Số lượng bản ghi -> phục vụ phân trang
$count = mysqli_fetch_assoc($query_get_count);

// Số lượng trang cần có
$count1 = $count['record_count'];
$numberPage = round($count1 / $quantityOfAPage) < ($count1 / $quantityOfAPage) ? (round($count1 / $quantityOfAPage) + 1) : round($count1 / $quantityOfAPage);

?>

<div class="container">

    <div class="topdistance"></div>
    <div class="product__yml">
        <div class="product__yml-ma" style="display: flex; align-items: center; justify-content: space-between; ">
            <div class="col-3" style="font-size: 16px;">
                <span>Sắp xếp theo:</span>
                <select id="sapxepSelect" style="margin: 0 12px; padding: 8px">
                    <option value="DEFAULT">---Mặc định---</option>
                    <option value="ASC">Thấp đến cao</option>
                    <option value="DESC">Cao đến thấp</option>
                </select>
            </div>

            <div class="col-3 m-auto hidden-sm hidden-xs">
                <div class="item-car clearfix">
                    <a href="index.php?quanly=cart" class="header__second__cart--icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="header__second__cart--notice" class="header__second__cart--notice"><?php echo isset($count1['record_count']) ? $count1['record_count'] : 0 ?></span>
                    </a>
                </div>
                <div class="item-like clearfix">
                    <a href="index.php?quanly=listlike&page=1" class="header__second__like--icon">
                        <i class="far fa-heart"></i>
                        <span id="header__second__like--notice" class="header__second__like--notice"><?php echo isset($count['record_count']) ? $count['record_count'] : 0 ?></span>
                    </a>
                </div>
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
                                <img class="card-img-top" src="<?php echo $row_dssp['image'] ?>" alt="Card image cap">
                                <form action="" class="hover-icon hidden-sm hidden-xs">
                                    <input type="hidden">
                                    <a href="./pay.html" class="btn-add-to-cart" title="Mua ngay">
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
                                    <p class="card-text price-color product__price-old"><?php echo $row_dssp['costPrice'] ?> đ</p>
                                    <p class="card-text price-color product__price-new"><?php echo $row_dssp['sellingPrice'] ?> đ</p>
                                </div>
                                <div class="home-product-item__action">
                                    <span class="home-product-item__like home-product-item__like--liked">
                                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                        <!-- <a href="pages/main/sanphamyeuthich.php?idSanPham=<?php echo $row_dssp['id']?>"><i class="home-product-item__like-icon-fill fas fa-heart"></i></a> -->
                                    </span>
                                    <?php
                                    // Xử lý việc tính sao trung bình của mỗi sp và hiển thị ra màn hình
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
                                        <!-- Kết thúc mã xử lý -->
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