<?php
include_once __DIR__ . "\db\dbc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ontvang de gegevens van de aanvraag
    $title = $_POST['title'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $user_id = $_POST['user_id'];

    // Controleer of de gebruiker het product heeft gekocht
    $check_purchase_query = "SELECT oi.order_id
                             FROM order_item oi
                             JOIN orders o ON oi.order_id = o.id
                             WHERE oi.product_id = ? AND o.user_id = ?";

    $check_stmt = $conn->prepare($check_purchase_query);
    $check_stmt->bind_param("ii", $productId, $user_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows === 0) {
        echo json_encode(array("Gebruiker heeft dit product nog niet gekocht."));
        exit;
    }

    // Voeg de review toe
    $insert_query = "INSERT INTO reviews (title, description, rating, user_id) 
                     VALUES (?, ?, ?, ?)";

    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("ssii", $title, $description, $rating, $user_id);

    if ($insert_stmt->execute()) {
        echo json_encode(array("Review is toegevoegd."));
    } else {
        echo json_encode(array("Error: " . $insert_stmt->error));
    }

    // Sluit de databaseverbinding
    $conn->close();
}
?>
