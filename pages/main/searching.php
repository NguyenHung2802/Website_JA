<style>
    
</style>

<?php
$search = '';

$sql_nhomsp = "SELECT DISTINCT byCompany FROM products";
$query_nhomsp = mysqli_query($connect, $sql_nhomsp);

if (isset($_POST['search-btn'])) {
    $search = $_POST['search'];
}

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    if ($id_user) {
        $sql_get_count = "SELECT COUNT(*) AS record_count FROM favorite_products where idUser = $id_user ";
        $query_get_count = mysqli_query($connect, $sql_get_count);

        // Số lượng bản ghi product 
        $count = mysqli_fetch_assoc($query_get_count);

        $count1['record_count'] = 0;
        $sql_get_idCart = "SELECT idCart FROM cart WHERE idUser = $id_user and statusCart = 0";
        $query_get_idCart = mysqli_query($connect, $sql_get_idCart);

        $idCartResult = mysqli_fetch_array($query_get_idCart);

        if (!$idCartResult == null) {
            $idCart = $idCartResult['idCart'];
            $sql_get_count_cart = "SELECT COUNT(*) AS record_count FROM cart_detail where idCart = $idCart";
            $query_get_count_cart = mysqli_query($connect, $sql_get_count_cart);

            // Số lượng bản ghi product 
            $count1 = mysqli_fetch_assoc($query_get_count_cart);
        }
    }
}

?>

<div class="search_main">
    <div class="container">
        <div class="topdistance"></div>
        <div class="mfp-container">
            <div class="mfp-content">
                <div class="thb-close-text">PRESS ESC TO CLOSE</div>
                <button title="Close (Esc)" class="mfp-close">
                    <a href="index.php"><i class="fa-solid fa-x"></i></a>                    
                </button>
                <form class="example" method="post" action="index.php?quanly=showAllProduct&page=1" id="searchForm">
                    <input type="text" class="input-search" placeholder="Tìm kiếm sản phẩm..." value="<?php echo $search ?>" name="search" id="searchInput">
                    <button type="submit" value="btn" name="search-btn" class="search-btn"><i class="fa fa-search"></i></button>
                </form>
               
                
            </div>
        </div>
    </div>
</div>

<script>
    // Lấy đối tượng form và ô tìm kiếm
    var searchForm = document.getElementById("searchForm");
    var searchInput = document.getElementById("searchInput");

    // Thêm sự kiện khi giá trị trong ô tìm kiếm thay đổi
    searchInput.addEventListener("input", function() {
        updateFormAction();
    });

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
