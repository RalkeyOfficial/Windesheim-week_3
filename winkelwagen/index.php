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
                <div class="flex">
                    <div>Artikel</div>
                    <div>($count)</div>
                </div>
                <div>€$Prijs</div>
            </div>
            <div class="box">
                <div>Verzendkosten</div>
                <div>€$prijs</div>
            </div>
            <hr>
            <div>Totaal</div>
            <div class="box">
                <div>Incl. BTW</div>
                <div>€$prijs</div>
            </div>
            <hr>
            <a href=''><button class='button-winkelwagen'>Ga verder naar de kassa</button></a>
        </div>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>