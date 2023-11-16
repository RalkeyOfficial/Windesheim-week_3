<?php
include_once __DIR__ . "\db\dbc.php";

global $conn;

function getData($product_ids = []) {
    global $conn;

    $query = "SELECT * FROM product";

    if (!empty($product_ids)) {
        $product_ids = implode(',', $product_ids);
        $query .= " WHERE id IN ($product_ids)";
    }

    return $conn->query($query);
}

$product_ids = [1, 2, 3];

$result = getData($product_ids);
?>
