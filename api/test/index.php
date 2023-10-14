<?php
require_once '../db/dbc.php';

// SIMPLE GET REQUEST

// define query
$query = "
SELECT product_id, SUM(quantity) AS total_quantity
FROM `order_item`
GROUP BY product_id
ORDER BY total_quantity DESC
LIMIT 10;
";

// execute query
// WARNING: you will only use query() if no user defined data will be used
// if ANYTHING in this query you receive from the user use a prepared statement
$res = $conn->query($query);

// return all results
while ($row = $res->fetch_assoc()) {
    print_r($row);
}

// free up memory
$res->free_result();

// close connection
$conn->close();
