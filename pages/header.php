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
    .header_nav .container{
        padding-left: 130px !important;
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
$search = '';

$sql_nhomsp = "SELECT DISTINCT byCompany FROM products";
$query_nhomsp = mysqli_query($connect, $sql_nhomsp);

if (isset($_POST['search-btn'])) {
    $search = $_POST['search'];
}

//$sql_get_count = "SELECT COUNT(*) AS record_count FROM favorite_products WHERE idUser=".$_SESSION['id_user']." GROUP BY idUser";
//$sql_get_count = "SELECT COUNT(*) AS record_count FROM favorite_products GROUP BY idUser";
//$query_get_count = mysqli_query($connect, $sql_get_count);

// Số lượng bản ghi product 
//$count = mysqli_fetch_assoc($query_get_count);

$sql_get_count_cart = "SELECT COUNT(*) AS record_count FROM cart_detail where idCart = 1";
$query_get_count_cart = mysqli_query($connect, $sql_get_count_cart);

// Số lượng bản ghi product 
$count1 = mysqli_fetch_assoc($query_get_count_cart);
?>
<style>
    .sliding-content {
        overflow: hidden;
        height: 20px;
        /* Điều chỉnh chiều cao theo ý muốn */
        position: relative;
        border: 0px solid #ccc;
        /* Để thấy rõ phần nội dung */
    }

    .content-wrapper {
        display: flex;
        overflow: hidden;
        justify-content: center;
    }

    .content_slide {
        flex: 1;
        text-align: center;
        margin: 0;
        line-height: 20px;
        opacity: 1;
        animation: fadeInOut 8s infinite;
        font-size: 13px;
        font-weight: 500;
        color: #000;
    }

    .header {
    background-color: var(--white-color);
    /* height: var(--header-height); */
    border-bottom: 1px solid #eee;
    position:fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999;
    box-shadow: 0 0 10px rgb(0 0 0 / 20%);
    
    }
    .non{
        color: #fff;
    }

    .header_logo-img img{
        height: 70px;
        width: auto;
        text-align: center;
    }

    .header_logo-img{
        text-align: center;
    }

    .header_nav-list-item a img{
        height: 28px;
        width: auto;
    }

    @keyframes fadeInOut {

        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-40px);
        }

        100% {
            transform: translateY(-80px);
        }

    }
</style>

<header class="header">
    <div class="sliding-content">
        <div class="content-wrapper" style="background-color: #fff">
            <div style="display: flex; flex-direction: column">
                <div class="content_slide">KHÁM PHÁ BÍ MẬT CỦA JULIETEE ARMAND</div>
                <div class="content_slide non">JA</div>
                <div class="content_slide">MỸ PHẨM HÀNG ĐẦU ĐẾN TỪ HY LẠP MANG LẠI KẾT QUẢ THỰC SỰ</div>
                <div class="content_slide non">     JA     </div>
                <div class="content_slide">KHÁM PHÁ SỨC MẠNH VÀ VẺ ĐẸP ĐÍCH THỰC CỦA THƯƠNG HIỆU MỸ PHẨM JA </div>
            </div>
        </div>
    </div>

    <div class="header_logo">
        <div class="header_logo-img">
            <img src="./img/trademark/main-logo.png" alt="logo-top">
        </div>
    </div>


    <nav class="header_nav hidden-sm hidden-xs">
        <div class="container">
            <ul class="header_nav-list nav">
                <li class="header_nav-list-item">
                    <a href="index.php" class="<?php echo isset($_GET['quanly'])  == null ? 'active' : '' ?>">
                        <img src="./img/trademark/logo-JA.png" alt="">
                    </a>
                </li>
                <li class="header_nav-list-item"><a href="index.php?quanly=trilieu" class="<?php echo isset($_GET['quanly']) && $_GET['quanly'] == 'trilieu' ? 'active' : '' ?>">Phương Pháp Trị Liệu</a></li>
                <li class="header_nav-list-item"><a href="index.php?quanly=daotao" class="<?php echo isset($_GET['quanly']) && $_GET['quanly'] == 'daotao' ? 'active' : '' ?>">Đào Tạo & Chuyển Giao</a></li>
                <li class="header_nav-list-item"><a href="index.php?quanly=sukien" class="<?php echo isset($_GET['quanly']) && $_GET['quanly'] == 'sukien' ? 'active' : '' ?>">Kiến Thức Sự Kiện</a></li>
                <li class="header_nav-list-item"><a href="index.php?quanly=gioithieu" class="<?php echo isset($_GET['quanly']) && $_GET['quanly'] == 'gioithieu' ? 'active' : '' ?>">Về JA</a></li>
                <li class="header_nav-list-item"><a href="index.php?quanly=contact" class="<?php echo isset($_GET['quanly']) && $_GET['quanly'] == 'contact' ? 'active' : '' ?>">Liên hệ</a></li>
                <li class="header_nav-list-item has-mega" style="padding: 2px 0;">
                    <a href="index.php?quanly=showAllProduct&page=1" class="<?php echo  isset($_GET['quanly']) && $_GET['quanly'] == 'showAllProduct' ? 'active' : '' ?>">Shop<i class="fa-brands fa-shopify"></i></a>
                </li>
                <li class="header_nav-list-item">
                    <a href="index.php?quanly=search" class="<?php echo isset($_GET['quanly']) && $_GET['quanly'] == 'search' ? 'active' : '' ?>">
                        <i class="fa-solid fa-magnifying-glass">

                        </i>
                    </a>
                    
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
    // Lấy đối tượng form và ô tìm kiếm
    var searchForm = document.getElementById("searchForm");
    var searchInput = document.getElementById("searchInput");

    // Thêm sự kiện khi giá trị trong ô tìm kiếm thay đổi
    // searchInput.addEventListener("input", function() {
    //     updateFormAction();
    // });

    // Hàm cập nhật giá trị trong URL
    function updateFormAction() {
        var currentUrl = window.location.href;
        var searchValue = searchInput.value;

        // Cập nhật giá trị trong action của form
        searchForm.action = "index.php?quanly=showAllProduct&search=" + encodeURIComponent(searchValue) + "&page=1";
    }

    // Gọi hàm cập nhật giá trị ban đầu
    updateFormAction();
</script>
