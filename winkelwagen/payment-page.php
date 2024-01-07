<?php

session_start();

if (!isset($_SESSION['logged_in'])){
    header('location: ../inlog/');
    exit;
}

include_once '../includes/globals.php';
require_once '../api/product-id-info.php';
require '../api/db/dbc.php';

global $conn;

$query = "
SELECT street_name, apartment_nr, postal_code, city
FROM user
WHERE id = ?
";
$result = $conn->execute_query($query, [$_SESSION['id']])->fetch_assoc();

$adresIsComplete = true;
foreach ($result as $key => $value) {
    global $adresIsComplete;
    if (empty($value)) $adresIsComplete = false;
}

if (!$adresIsComplete) {
    header('location: /mijngegevens/?message= U heeft nog niet uw adress gegevens ingevuld.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="winkelwagen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>NerdyGadgets | Betaalmethode</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <h2 class="title">Betaalmethode</h2>
    <div class="wrap">

        <div class="box">
            <form action="process-payment.php" method="post">
                <h1>Selecteer Betaalmethode:</h1>
                <hr>
                <label>
                    <input type="radio" name="payment_method" value="paypal">
                    PayPal
                </label>
                <hr>
                <label>
                    <input type="radio" name="payment_method" value="klarna" required>
                    Klarna
                </label>
                <hr>
                <label>
                    <input type="radio" name="payment_method" value="credit_card" required>
                    Credit Card
                </label>
                <hr>
                <label>
                    <input type="radio" name="payment_method" value="ideal">
                    iDEAL
                </label>
                <hr>

                <div id="banks" style="display: none;">
                    <h3>Selecteer bank:</h3>
                    <select name="ideal_bank">
                        <option value="ING">ING</option>
                        <option value="iABN AMROng">ABN AMRO</option>
                        <option value="ASN Bank">ASN Bank</option>
                        <option value="Bunq">Bunq</option>
                        <option value="Knab">Knab</option>
                        <option value="Rabobank">Rabobank</option>
                        <option value="Regiobank">Regiobank</option>
                        <option value="Revolut">Revolut</option>
                        <option value="SNS">SNS</option>
                        <option value="Triodos Bank">Triodos Bank</option>
                    </select>
                </div>
                <button class='button-winkelwagen' type="submit">Pay Now</button>
                <div id="popup">
                    <div id="popup-content">
                    <iframe width="500" height="500" src="https://www.youtube.com/embed/xvFZjo5PgG0?"></iframe> 
                    <button onclick="closePopup()">Close</button>
                </div>
  </div>
            </form>
        </div>

        <div>
            <div class="box">
                <!-- winkelwagen -->
                <h1>Samenvatting</h1>
                <?php
                    $total = 0;
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $product_ids = array_column($_SESSION['cart'], 'product_id');
                        $result = getData($product_ids);

                        foreach ($result as $row) {
                            $productPrice = $row['price'];
                            $total = $total + (int)$productPrice;
                        }
                    } 
                ?>
                <hr>
                <div class="flex">
                    <h4>Subtotaal</h4>
                    <h4>€<?php echo "<span class='totalCost'>{$_POST['total']}</span>";?></h4>
                </div>

                <div class="flex">
                    <h4>Verzendkosten</h4>
                    <h4>Gratis!</h4>
                </div>
                <hr>
                <h4>Totaal</h4>
                <div class="flex">
                    <h4>Incl. BTW</h4>
                    <h4>€<?php echo "<span class='totalCost'>{$_POST['total']}</span>";?></h4>
                </div>
            </div>
        </div>
    </div>

    </div>
<!-- footer -->
<?php include_once ROOT . '/components/footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="winkelwagen.js"></script>
<script src="easter.js"></script>

</body>

</html>
