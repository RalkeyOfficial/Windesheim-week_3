<?php

$products = getProducts($_GET['search'] ?? "");
    if (isset($_POST['add'])){
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "product_id");
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }else{
            $item_array = array(
                    'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][0] = $item_array;
        }
    }
?>