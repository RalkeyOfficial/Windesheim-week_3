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

    <div>
        <div> <!-- product -->

        </div>
        <div> <!-- winkelwagen -->
            <div>Samenvatting</div>
            <hr>
            <div>Subtotaal</div>
            <div class="box">
                <div>Artikel</div>
                <div>$Prijs</div>
            </div>
            <div class="box">
                <div>Verzondkosten</div>
                <div>$prijs</div>
            </div>
            <hr>
            <div>Totaal</div>
            <div class="box">
                <div>Incl. BTW</div>
                <div>$prijs</div>
            </div>
            <hr>
            <a href=''><button class='button-winkelwagen'>Ga verder naar de kassa</button></a>
        </div>
        <div class='product-info'>
                            <p class='smallcategorietekst'>$productCategory</p> <!-- category -->
                            <h1>$productName</h1> <!-- product name --> 
                            <hr>
                            <h4>€$productPrice</h4> <!-- product price -->
                            <hr>
                            <div>
                                <div class='voorraad'>
                                    <span class='dot'></span>
                                    <h4>Online op voorraad</h4>
                                </div>
                                <div class='left-space'>
                                    <h4>Voor 23:59 besteld, morgen in huis!</h4>
                                    <h4>30 dagen bedenktermijn!</h4>
                                    <h4>36 maanden garantie!</h4>
                                </div>
                            </div>
                            <hr>
                            <a href='/winkelwagen'><button class='button-winkelwagen'>Toevoegen aan winkelwagen</button></a> <!-- button -->
                        </div>
    </div>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>