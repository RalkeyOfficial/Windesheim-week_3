<?php

function getProducts($search = "")
{
    include_once __DIR__ . "\db\dbc.php";

    $query = "
    SELECT *
    FROM product
    WHERE name LIKE '%{$search}%'
    LIMIT 12
    ";


    return $conn->query($query);
}
