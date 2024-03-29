<?php

// +===================================+
//      please dont touch this code     
//   unless you know what you're doing  
//         this code is a bitch         
// +===================================+

include_once __DIR__ . "\db\dbc.php";

class Product
{
    private $conn;

    public function __construct()
    {
        global $conn; // Access the global $conn variable
        $this->conn = $conn;
    }

    function getAll($search = "", $categories = [], $order = "", $prijs = "", $minprijs = "", $maxprijs = "", $limit = -1, $page = -1)
    {
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

        // limit query + pagination
        $limitStr = "LIMIT ?";
        if ($page >= 0 && $limit > 0) {
            $limitStr .= ", ?";
            array_push($preparedData, $limit * ($page - 1)); // $page should be -1 due to the way offset works in sql + how we send the page this file
        }

        // check if limit is defined or nah
        if ($limit == -1) $limit = 999999;
        array_push($preparedData, $limit);

        $query = "
        SELECT p.*, c.naam AS category, c.id AS category_id
        FROM product p
        JOIN categories c ON p.category_id = c.id
        WHERE name LIKE ? AND (price BETWEEN ? AND ?) {$categorieClause}
        {$order}
        {$limitStr}
        ";


        return $this->conn->execute_query($query, $preparedData);
    }

    function getOne($id)
    {
        $preparedData = [$id];

        $query = "
        SELECT p.*, c.naam AS category, c.id AS category_id 
        FROM product p
        JOIN categories c ON p.category_id = c.id
        WHERE p.id = ?
        LIMIT 1
        ";

        return $this->conn->execute_query($query, $preparedData);
    }

    function getRelated($categoryId, $productId)
    {
        $preparedData = [$categoryId, $productId];

        $query = "
        WITH product_sales AS (
            SELECT product_id, SUM(quantity) AS total_quantity
            FROM order_item
            GROUP BY product_id
        )
        SELECT p.*, c.naam AS category, c.id AS category_id
        FROM product p
        JOIN product_sales ps ON p.id = ps.product_id
        JOIN categories c ON p.category_id = c.id
        WHERE c.id = ? AND p.id <> ?
        ORDER BY ps.total_quantity DESC
        LIMIT 4;
        ";

        return $this->conn->execute_query($query, $preparedData);
    }
}
