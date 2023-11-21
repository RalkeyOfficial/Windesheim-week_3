<?php
if (isset($_POST['add'])){
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
    }
}
?>