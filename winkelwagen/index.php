<?php

session_start();

include_once '../includes/globals.php';
require_once '../api/getdata.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="winkelwagen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>NerdyGadgets | winkelwagen</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <h2 class="title">Mijn Winkelwagen</h2>
    <div class="wrap">
        <div class="shopping-cart">
            <?php
            $total = 0;
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $product_ids = array_column($_SESSION['cart'], 'product_id');
                $result = getData($product_ids);

                foreach ($result as $row) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];
                    $total = $total + (int)$productPrice;

                    echo "
                        <div class='box product-data'>
                            <div class='flexbox'>
                                <img src='/images/products/{$productImage}.jpg' alt='{$productName}'>
                                <div class='left-space'>
                                    <h4>{$productName}</h4>
                                    <h4>{$productPrice}</h4>
                                    <div class='voorraad'>
                                        <span class='dot'></span>
                                        <h4>Online op voorraad</h4>
                                    </div>
                                    <div class='quantity'>
                                        <a href='../api/remove-item.php?id={$productId}'><i class='fa fa-trash fa-solid fa-2xl' aria-hidden='true'></i></a>
                                        <div class='left-space'>
                                            <button class='button-decrement'><i class='fa fa-minus'></i></button>
                                            <input type='text' class='form-control input-qty' value='1' disabled>
                                            <button class='button-increment'><i class='fa fa-plus'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                }
            } else {
                echo "<h3>Er zijn geen producten in jouw winkelwagen</h3>";
            }
            ?>
        </div>

        <div>
            <div class="box">
                <!-- winkelwagen -->
                <h1>Samenvatting</h1>
                <hr>
                <h4>Subtotaal</h4>
                <div class="flex">
                    <div class="flex">
                        <?php
                        $count = 0;
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<h4>Artikel ($count items)</h4>";
                        } else {
                            echo "<h4>Artikel (0 items)</h4>";
                        }
                        ?>
                    </div>
                    <h4>€<?php echo $total; ?></h4>
                </div>

                <div class="flex">
                    <?php 
                        if ($total > 1) {
                            echo '<h4>Verzendkosten</h4>';
                            echo '<h4>Gratis!</h4>';
                        }
                    ?>
                </div>
                <hr>
                <h4>Totaal</h4>
                <div class="flex">
                    <h4>Incl. BTW</h4>
                    <h4>€<?php echo $total; ?></h4>
                </div>
                <hr>
                <?php
                    if ($count > 0) {
                        echo "<button class='button-winkelwagen' onclick='redirectToPayment()'>Ga verder naar de kassa</button>";
                    } else {
                        echo "<button class='button-winkelwagen' onclick='redirectToOverview()'>Bekijk onze producten</button>";
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="winkelwagen.js"></script>
    
</body>

</html>