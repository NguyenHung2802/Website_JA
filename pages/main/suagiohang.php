<?php
    session_start();
    include("../../admin/config/connect.php");
    //Tăng số lượng
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array('name'=>$cart_item['name'], 'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'], 'sellingPrice'=>$cart_item['sellingPrice'],
                'image'=>$cart_item['image']);
                $_SESSION['cart'] = $product;
            }else{
                $product[] = array('name'=>$cart_item['name'], 'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']+1, 'sellingPrice'=>$cart_item['sellingPrice'],
                'image'=>$cart_item['image']);
                $_SESSION['cart'] = $product;
            }
        }
        header('Location:../../index.php?quanly=cart');
    }

    //Giảm số lượng
    if(isset($_GET['tru'])){
    $id = $_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id'] != $id){
            $product[] = array('name'=>$cart_item['name'], 'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'], 'sellingPrice'=>$cart_item['sellingPrice'],
            'image'=>$cart_item['image']);
            $_SESSION['cart'] = $product;
        }else{
            if($cart_item['soluong']>1){
                $product[] = array('name'=>$cart_item['name'], 'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']-1, 'sellingPrice'=>$cart_item['sellingPrice'],
                'image'=>$cart_item['image']);
            }else{
                $product[] = array('name'=>$cart_item['name'], 'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'], 'sellingPrice'=>$cart_item['sellingPrice'],
                'image'=>$cart_item['image']);
            }
            
            $_SESSION['cart'] = $product;
        }
    }
        header('Location:../../index.php?quanly=cart');
    }
?>