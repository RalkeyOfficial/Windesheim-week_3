<?php

function getProducts($search = "", $categories = [], $order = "", $prijs = "", $minprijs = "", $maxprijs = "")
{
    include_once __DIR__ . "\db\dbc.php";

    $preparedData = [];

    // push search query to prepared data array
    // we use prepared data to avoid a SQL Injection attack
    array_push($preparedData, "%$search%");

    // Manage product order
    $orderClauses = [];

    if ($order == "az") array_push($orderClauses, "name ASC");
    if ($order == "za") array_push($orderClauses, "name DESC");

    if ($prijs == "lh") array_push($orderClauses, "price ASC");
    if ($prijs == "hl") array_push($orderClauses, "price DESC");

    $order = "";
    if (isset($orderClauses[0])) $order = "ORDER BY " . join(", ", $orderClauses);
    // adding data to prepared statement is not needed here as this part is SQL injection safe

    // Manage min/max price default value
    if (!$minprijs) $minprijs = "0";
    if (!$maxprijs) $maxprijs = "999999";
    // push min/max price to prepared data array
    array_push($preparedData, $minprijs);
    array_push($preparedData, $maxprijs);

    // manage categories in the WHERE clause
    $categorieClause = "";
    if (isset($categories[0])) $categorieClause = "AND category_id IN (" . implode(', ', array_fill(0, count($categories), '?')) . ")";
    // push categories to prepared data array
    // this is done using the spread operator (...) since $categories already an array is
    array_push($preparedData, ...$categories);

    $query = "
    SELECT *
    FROM product
    WHERE name LIKE ? AND (price BETWEEN ? AND ?) {$categorieClause}
    {$order}
    LIMIT 12
    ";


    return $conn->execute_query($query, $preparedData);
}
