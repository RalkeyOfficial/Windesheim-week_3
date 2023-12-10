
<?php

session_start();

if (!isset($_SESSION['logged_in'])){
    header('location: ../inlog/');
    exit;
}
if (isset($_GET['logout'])){
    if (isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['email']);
        unset($_SESSION['first_name']);
        header('location: ../inlog/');
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>NerdyGadgets | Account</title>
</head>

<body>
<section class="account-container">
    <div class="row container">
        <div class="text-center">
            <h3 class="bold">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Naam:<span><?php if (isset($_SESSION['first_name'])){ echo $_SESSION['first_name'];} ?></span></p>
                <p>E-mail:<span><?php if (isset($_SESSION['email'])){ echo $_SESSION['email'];} ?></span></p>
                <p><a href="../home/" id="order-btn">Terug naar startscherm</a> </p>
                <p><a href="../account/?logout=1" id="Logout-btn">Uitloggen</a> </p>
                <p><a href="../mijngegevens/" id="order-btn">Mijn gegevens</a> </p>

            </div>

        </div>

    </div>

</section>

</body>

</html>
