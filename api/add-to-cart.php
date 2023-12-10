<?php

session_start();

if (isset($_POST['add'])) {
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();

    // check if id is already in cart
    $isNotPresent = true;
    foreach ($_SESSION['cart'] as $item) {
        if ($item['product_id'] == $_POST['product_id']) {
            $isNotPresent = false;
            break;
        }
    }

    if ($isNotPresent) {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][] = $item_array;

        echo json_encode(['status' => 200, 'message' => "Product ID {$_POST['product_id']} added to cart"]);
    } else {
        echo json_encode(['status' => 418, 'message' => "Product ID already in cart"]);
    }
}
