<?php 
    session_start();
    include('../../admin/config/connect.php');
    if(isset($_POST['themgiohang']) && isset($_POST['soluong'])){
        //session_destroy();
        $soluongsp = $_POST['soluong'];
        $id = $_GET['idsanpham'];
        //$soluong=1;
        $soluong = (int)$soluongsp;
        $sql = "SELECT * FROM products WHERE idProduct = '".$id."' LIMIT 1";
        $query = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product = array(array('name'=>$row['name'], 'id'=>$id, 'soluong'=>$soluong, 'sellingPrice'=>$row['sellingPrice'],
            'image'=>$row['image'] ));
            //Kiem tra session gio hang ton tai
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id'] == $id){
                        $product[] = array('name'=>$cart_item['name'], 'id'=>$cart_item['id'], 'soluong'=>$soluong, 'sellingPrice'=>$cart_item['sellingPrice'],
                            'image'=>$cart_item['image']);
                            $found = true;
                    }else{
                        $product[] = array('name'=>$cart_item['name'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 'sellingPrice'=>$cart_item['sellingPrice'],
                            'image'=>$cart_item['image'] );
                    }
                }
                if($found == false){
                    //lien ket du lieu new_product voi product
                    $_SESSION['cart'] = array_merge($product,$new_product);
                }else{
                    $_SESSION['cart'] = $product;
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location:../../index.php?quanly=cart');
    }
?>