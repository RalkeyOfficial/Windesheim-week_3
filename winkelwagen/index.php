<?php include_once '../includes/globals.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="winkelwagen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>NerdyGadgets | home</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <h2 class="title">Winkelwagen</h2>

    <div class="wrap">
        <div class="container">
            <div class="row">
                <?php 
                    include_once '../api/product-info.php';

                    foreach ($result as $row) {
                        $productName = $row['name'];
                        $productPrice = $row['price'];
                        $productImage = $row['image'];

                        // if cent is 00 replace it with -
                        $productPrice = preg_replace('/.00$/', '.-', $productPrice);

                        echo "
                            <div class='box'>
                                <div class='flexbox'>
                                    <img src=/images/products/{$productImage}.jpg alt={$productName}>
                                    <div class='left-space'>
                                        <h4>$productName</h4>
                                        <h4>$productPrice</h4>
                                        <div class='voorraad'>
                                            <span class='dot'></span>
                                            <h4>Online op voorraad</h4>
                                        </div>
                                        <div class='quantity'>
                                            <img src=/images/winkelwagen/trash.png alt='trash'>
                                            <button class='button-increment'>+</button>
                                            <div> 1 </div>
                                            <button class='button-increment'>-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    ?>
            </div>
        </div>
        <div class="container">
            <div class="box"> <!-- winkelwagen -->
                <h1>Samenvatting</h1>
                <hr>
                <h4>Subtotaal</h4>
                <div class="flex">
                    <div class="flex">
                        <h4>Artikel</h4>
                        <h4>($count)</h4>
                    </div>
                    <h4>€$Prijs</h4>
                </div>
                
                <div class="flex">
                    <h4>Verzendkosten</h4>
                    <h4>€$prijs</h4>
                </div>
                <hr>
                <h4>Totaal</h4>
                <div class="flex">
                    <h4>Incl. BTW</h4>
                    <h4>€$prijs</h4>
                </div>
                <hr>
                <a href=''><button class='button-winkelwagen'>Ga verder naar de kassa</button></a>
            </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>