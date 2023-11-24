<?php
include_once __DIR__ . "\db\dbc.php";

    // Ontvang de gegevens van de aanvraag
    $title = $_POST['title'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $order_item_id = $_POST['order_item_id'];

    // Controleer of de gebruiker het product heeft gekocht
    $check_purchase_query = "SELECT DISTINCT NULLIF (oi.product_id = ?, 0) AS result
                            FROM `order` o 
                            JOIN order_item oi ON oi.order_id = o.id
                            WHERE o.user_id  = ?
                            ";

    $check_stmt = $conn->prepare($check_purchase_query);
    $check_stmt->bind_param("ii", $product_id, $user_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    $has_purchased = false;
    foreach ($check_result as $row) {
        if ($row[0] == 0) {
            $has_purchased = true;
            break;
        }
    }
    
    if (!$has_purchased) {
        echo json_encode(array("Gebruiker heeft dit product nog niet gekocht."));
    } else {
        // Voeg de review toe
        $insert_query = "INSERT INTO reviews (title, description, rating, user_id, order_item_id) 
                        VALUES (?, ?, ?, ?, ?)";

        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("ssiii", $title, $description, $rating, $user_id, $order_item_id);

        if ($insert_stmt->execute()) {
            echo json_encode(array("Review is toegevoegd."));
        } else {
            echo json_encode(array("Error: " . $insert_stmt->error));
        }
    }
    // Sluit de databaseverbinding
    $conn->close();
?>