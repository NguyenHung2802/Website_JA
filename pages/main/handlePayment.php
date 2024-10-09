<?php
// Xử lý cho Momo
if (isset($_GET['resultCode'])) {
    $resultCode = $_GET['resultCode'];
    if ($resultCode == '1006') {
        header("Location: http://localhost:8080/WebSite_JA/index.php?quanly=showAllProduct&page=1");
    } else {
        header("Location: http://localhost:8080/WebSite_JA/pages/main/paymentSuccess.php");
    }
    exit(); // Quan trọng để dừng thực thi mã tiếp theo
}

// Xử lý cho VNPay
// Kiểm tra nếu có phản hồi từ VNPay qua tham số vnpay_response
if (isset($_GET['vnpay_response'])) {
    // Giải mã JSON nhận được từ VNPay
    $jsonResponse = urldecode($_GET['vnpay_response']);
    $responseData = json_decode($jsonResponse, true);

    // Kiểm tra phản hồi có mã code là 00 (thành công) và có URL thanh toán
    if ($responseData && isset($responseData['code']) && $responseData['code'] === '00' && isset($responseData['data'])) {
        // Lấy URL thanh toán từ trường 'data' trong phản hồi
        $paymentUrl = $responseData['data'];

        // Chuyển hướng người dùng tới URL thanh toán VNPay
        header("Location: $paymentUrl");
        exit();
    } else {
        // Nếu mã code không thành công hoặc không có URL, chuyển hướng tới trang khác
        header("Location: http://localhost:8080/WebSite_JA/index.php?quanly=showAllProduct&page=1");
        exit();
    }
} else {
    // Xử lý khi không có phản hồi từ VNPay hoặc các trường hợp khác
    header("Location: http://localhost:8080/WebSite_JA/pages/main/paymentSuccess.php");
}


