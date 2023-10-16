<?php
include_once __DIR__ . "\db\dbc.php";

// SIMPLE GET REQUEST

// define query
$query = "
SELECT p.*
FROM `order` o
JOIN order_item oi ON o.id = oi.order_id
JOIN product p ON oi.product_id = p.id
ORDER BY o.order_date desc
LIMIT 5;
";

// execute query & get result
// WARNING: you will only use query() if no user defined data will be used
// if ANYTHING in this query you receive from the user use a prepared statement
$result = $conn->query($query);
