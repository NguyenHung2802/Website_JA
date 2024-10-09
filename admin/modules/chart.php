<style>
    .simple-bar-chart {
        --line-count: 10;
        --line-color: currentcolor;
        --line-opacity: 0.25;
        --item-gap: 2%;
        --item-default-color: #060606;

        height: 40rem;
        display: grid;
        grid-auto-flow: column;
        gap: var(--item-gap);
        align-items: end;
        padding-inline: var(--item-gap);
        --padding-block: 1.5rem;
        /*space for labels*/
        padding-block: var(--padding-block);
        position: relative;
        isolation: isolate;
    }

    .simple-bar-chart::after {
        content: "";
        position: absolute;
        inset: var(--padding-block) 0;
        z-index: -1;
        --line-width: 1px;
        --line-spacing: calc(100% / var(--line-count));
        background-image: repeating-linear-gradient(to top, transparent 0 calc(var(--line-spacing) - var(--line-width)), var(--line-color) 0 var(--line-spacing));
        box-shadow: 0 var(--line-width) 0 var(--line-color);
        opacity: var(--line-opacity);
    }

    .simple-bar-chart>.item {
        height: calc(1% * var(--val));
        background-color: var(--clr, var(--item-default-color));
        position: relative;
        animation: item-height 1s ease forwards
    }

    @keyframes item-height {
        from {
            height: 0
        }
    }

    .simple-bar-chart>.item>* {
        position: absolute;
        text-align: center
    }

    .simple-bar-chart>.item>.label {
        inset: 100% 0 auto 0;
        color: #000;
    }

    .simple-bar-chart>.item>.value {
        inset: auto 0 100% 0
    }

    /* demo */
    body {
        margin: 0;
        color: #1D1E22;
        background-color: #f0f0f0;
        font-family: system-ui, sans-serif;
    }

    @media (prefers-color-scheme: dark) {
        body {
            background-color: #1D1E22;
            color: #000;
        }
    }
</style>

<?php
// Lấy thời điểm hiện tại
$currentMonth = date("n") + 1;
$currentYear = date("Y");

$totalRevenue = 0;
$resultArray = [];

for ($i = 0; $i < 6; $i++) {
    $currentMonth -= 1;

    if ($currentMonth <= 0) {
        $currentMonth += 12;
        $currentYear -= 1;
    }

    $firstDayOfMonth = date("Y-m-01", strtotime("$currentYear-$currentMonth-01"));
    $lastDayOfMonth = date("Y-m-t", strtotime("$currentYear-$currentMonth-01"));

    $sql = "SELECT COUNT(cart.idCart) AS order_count
            FROM cart 
            WHERE 
            cart.createdAt BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'
            AND cart.statusCart IN (3, 4)";

    // Thực hiện truy vấn SQL
    $result = $connect->query($sql);

    // Kiểm tra và hiển thị kết quả
    if ($result !== false) {
        $row = $result->fetch_assoc();
        $resultArray[] = $row["order_count"];
    } else {
        echo "Không có dữ liệu cho tháng $currentMonth-$currentYear<br>";
    }

    $sql_calculate = "SELECT idCart
    FROM cart WHERE cart.createdAt BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'
    AND cart.statusCart = 4";

    // Thực hiện truy vấn SQL
    $result_calcultae = $connect->query($sql_calculate);

    foreach ($result_calcultae as $index => $value) {
        $idCart = $value['idCart'];
        $sql_total_cart = "SELECT SUM(sellingPrice * quantity) as total 
        FROM cart_detail 
        INNER JOIN products ON cart_detail.idProduct = products.idProduct 
        INNER JOIN cart ON cart_detail.idCart = cart.idCart 
        WHERE cart.idCart = '$idCart' and cart.statusCart = 4";

        // Thực hiện truy vấn SQL
        $query_total_cart = mysqli_query($connect, $sql_total_cart);
        $total_cart = mysqli_fetch_array($query_total_cart);
        $totalRevenue += $total_cart['total']; // Cộng tổng số tiền từ mỗi tháng vào biến tổng
    }
}

function calculateLimit($number)
{
    $result1 = $number * 10;
    $result = ($number * 10) - ($result1 / $number);
    return $result;
}


$maxValue = max($resultArray);
$limitValue = $maxValue;
?>

<div style="padding: 24px 0 0 24px">
    <h2 style="margin: 0 0 12px 0">Thống kê 6 tháng gần đây</h2>
    <span>(Biểu đồ tính trên tổng đơn đang giao và đã giao)</span>
    <div class="simple-bar-chart" style="margin-top: 24px">

        <?php
        $colorArr = ['#5EB344', '#FCB72A', ' #F8821A', '#E0393E', '#963D97', '#069CDB'];
        foreach ($resultArray as $index => $value) { ?>
            <div class="item" style="--clr: <?php echo $colorArr[$index] ?>; --val: <?php echo $value / $limitValue * 100 ?>">
                <div class="label" style="margin-top: 8px; font-size: 14px;">Tháng <?php echo $currentMonth = date("n") - $index ?></div>
                <div style="margin-top: 8px;" class="value"><?php echo $value ?> đơn hàng</div>
            </div>
        <?php
        }
        ?>

    </div>
    <div style="margin-top: 24px">
        <span style="font-size: 16px; font-weight: 600">Tổng doanh thu trong 6 tháng: <?php
        echo number_format($totalRevenue)
        ?> VNĐ</span>
    </div>
</div>