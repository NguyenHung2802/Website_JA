<?php
    session_start();
    include('../../admin/config/connect.php');

    //Xóa sản phẩm trong giỏ hàng
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                //thiết lập lại session
                $product[] = array('name'=>$cart_item['name'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 'sellingPrice'=>$cart_item['sellingPrice'],'image'=>$cart_item['image']);

            }
        }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=cart');
    }
?> 