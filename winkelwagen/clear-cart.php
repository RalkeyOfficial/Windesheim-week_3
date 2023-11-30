<?php
session_start();

unset($_SESSION['cart']);

echo json_encode(['status' => 'success', 'message' => 'Cart cleared successfully']);
?>
