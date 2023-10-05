<?php include_once '../includes/globals.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/overstyle1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>NerdyGadgets | home</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <main>
        <div class="container">
            <a href=""><img src="img/highlighted-products/keyboard.jpg" alt="keyboard" class="banner"></a>
        </div>

        <div class="container">
            <div class="row">
                <a href=""><img src="img/highlighted-products/action_1.jpg" alt="ACTIE" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/action_2.png" alt="ACTIE" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/action_3.png" alt="ACTIE" class="boxes"></a>
            </div>
        </div>

        <div class="container">
        <h1 class="highlights">highlighted products!</h1>
            <div class="row">
                <a href=""><img src="img/highlighted-products/1_AMD-Ryzen-7-7800X3D-Processor.jpg" alt="highlighted product" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/1_Asus-ROG-STRIX-B650E-F-GAMING-WIFI.jpg" alt="highlighted product" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/1_Corsair-DDR4-Vengeance-LPX-2x8GB-3200-Geheugenmodule.jpg" alt="highlighted product" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/1_Fractal-Design-North-Charcoal-Black-TG-Dark-Midi-Tower-Behuizing.jpg" alt="highlighted product" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/1_MSI-G272QPF-27-2K-170Hz-IPS-gaming-monitor.jpg" alt="highlighted product" class="boxes"></a>
            </div>
        </div>

        <div class="container">
            <a href=""><img src="img/highlighted-products/banner_2.avif" alt="Headphones" class="banner"></a>
        </div>

        <div class="container">
            <div class="row">
                <a href=""><img src="img/highlighted-products/headphones.jpg" alt="Headphones" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/headphones.jpg" alt="Headphones" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/headphones.jpg" alt="Headphones" class="boxes"></a>
                <a href=""><img src="img/highlighted-products/headphones.jpg" alt="Headphones" class="boxes"></a>
            </div>
        </div>

        <!---Over ons Pagina--->
        <section class="over-ons">
            <div class="main">
                <img src="../images/Logo-website.png" alt="Logo">
                <div class="over-ons-text">
                    <h2>Over Ons</h2>
                    <h5>Leef nerdy, kies NerdyGadgets</h5>
                    <p>Nerdy Gadgets is dé besteming voor technologie- en popcultuurliefhebbers in Nederland.
                        Wij zijn gepassioneerd door de wereld van gadgets, verzamelobjecten en futuristische technologie
                        en we delen deze passie graag met onze klanten.</p>
                    <a href="/over-ons"><button class="button-over">Meer info?</button></a>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>