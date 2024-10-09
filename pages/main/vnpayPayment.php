<?php
header('Content-type: text/html; charset=utf-8');
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost:8080/WebSite_JA/pages/main/handlePayment.php";
    $vnp_TmnCode = "C79J1OER";//Mã website tại VNPAY 
    $vnp_HashSecret = "OYAAJKHRNMJ9SXZRCQ0Q57NIX9S1ZR44"; //Chuỗi bí mật
    
    $vnp_TxnRef = rand(60,9999) . ""; // Mã đơn hàng
    $vnp_OrderInfo = "Thanh toan qua VNPay";
    $vnp_OrderType = "billpayment";
    $vnp_Amount = str_replace(',', '', $_POST['totalCart']) * 100; // Số tiền * 100
    $vnp_Locale = "vn";
    $vnp_BankCode = "NCB";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //127.0.0.1

    //Billing
    // $vnp_Bill_Mobile = '0364672920';
    // $vnp_Bill_Email = 'nguyenvanhungg28@gmail.com';
    // $fullName = trim('Nguyen Van Hung');
    // if (isset($fullName) && trim($fullName) != '') {
    //     $name = explode(' ', $fullName);
    //     $vnp_Bill_FirstName = array_shift($name);
    //     $vnp_Bill_LastName = array_pop($name);
    // }
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    // }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    // Thêm log để debug
    error_log("Hashdata before creating secure hash: " . $hashdata);
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        // Thêm log để debug
        error_log("Generated vnp_SecureHash: " . $vnpSecureHash);
    }
    $returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);

    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        // die();
    } else {
        // Thêm header để chỉ định rằng đây là JSON
        header('Content-Type: application/json');
        echo json_encode($returnData);
        exit(); // Kết thúc script sau khi gửi JSON
    }
   

