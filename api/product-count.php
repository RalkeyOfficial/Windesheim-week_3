<?php

include_once __DIR__ . "\db\dbc.php";


function getCount($categories = [], $minprijs = "", $maxprijs = "")
{
    global $conn;

    $preparedData = [];

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
        SELECT count(*) AS count
        FROM product p
        JOIN categories c ON p.category_id = c.id
        WHERE (price BETWEEN ? AND ?) $categorieClause
        ";

    return $conn->execute_query($query, $preparedData)->fetch_assoc()['count'];
}
