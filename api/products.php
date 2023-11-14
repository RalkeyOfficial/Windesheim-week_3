<?php

function getProducts($search = "",$categories=[],$order="", $prijs="", $minprijs="", $maxprijs="")
{
    include_once __DIR__ . "\db\dbc.php";

    $orderClauses = [];

if ($order == "az") array_push($orderClauses, "name ASC");
if ($order == "za") array_push($orderClauses, "name DESC");

if ($prijs == "lh") array_push($orderClauses, "price ASC");
if ($prijs == "hl") array_push($orderClauses, "price DESC");

$order = "";
if (isset($orderClauses[0])) $order = "ORDER BY " . join(", ", $orderClauses);

    if (!$minprijs) $minprijs = "0";
if (!$maxprijs) $maxprijs = "999999";

    $categorieClause = "";
    if (isset($categories[0])) $categorieClause = "AND category_id IN (" . join(", ", $categories) . ")";


    $query = "
   SELECT *
FROM product
WHERE name LIKE '%{$search}%' AND (price BETWEEN {$minprijs} AND {$maxprijs}) {$categorieClause}
{$order}
LIMIT 12";


    return $conn->query($query);
}
