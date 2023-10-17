<?php 
include_once __DIR__ . "\db\dbc.php";

// SIMPLE GET REQUEST

// define query

$query = "
SELECT * 
FROM product
LIMIT 1;
";

// execute query & get result
// WARNING: you will only use query() if no user defined data will be used
// if ANYTHING in this query you receive from the user use a prepared statement

$result = $conn->query($query);