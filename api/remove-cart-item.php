<?php
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productIdToRemove = $_GET['id'];

    if (isset($_SESSION['cart'])) {
        // Find the index of the product in the cart array
        $indexToRemove = array_search($productIdToRemove, array_column($_SESSION['cart'], 'product_id'));

        // Remove the product from the cart
        if ($indexToRemove !== false) {
            unset($_SESSION['cart'][$indexToRemove]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

header("Location: ../winkelwagen/index.php"); // Redirects back to winkelwagen
exit();
?>
