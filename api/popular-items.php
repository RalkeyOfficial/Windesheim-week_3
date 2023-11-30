<?php
require "db\dbc.php";

// SIMPLE GET REQUEST

// define query
$query = "
WITH product_sales AS ( -- create a CTE table called product_sales which gets all the distinct products sold
    SELECT product_id, SUM(quantity) AS total_quantity
    FROM order_item
    GROUP BY product_id
)
SELECT p.*
FROM product p
JOIN product_sales ps ON p.id = ps.product_id -- join product on CTE product_sales based on id
ORDER BY ps.total_quantity DESC -- order by total amount sold descending
LIMIT 5;
";

// execute query & get result
// WARNING: you will only use query() if no user defined data will be used
// if ANYTHING in this query you receive from the user use a prepared statement
$result = $conn->query($query);
