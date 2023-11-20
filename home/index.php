<?php 

    session_start();

    include_once '../api/products.php';
    include_once '../includes/globals.php';
    include_once '../api/add-to-cart.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/overstyle1.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <script src="js/carousel.js" defer></script>
    <title>NerdyGadgets | home</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <main>
        <div class="container image-carousel">
            <ul>
                <li><a href=""><img src="img/1475_SHL_BlackWeek_ASUS-Notebooks_2023_d_V2.webp" alt="banner" class="banner"></a></li>
                <li><a href=""><img src="img/1475_SHL_BlackWeek_MSI-Notebooks_2023_d.webp" alt="banner" class="banner"></a></li>
                <li><a href=""><img src="img/1475_SHL_BlackWeek_SamsungSSD_2023_d.webp" alt="banner" class="banner"></a></li>
                <li><a href=""><img src="img/1475_SHL_MSI_BigCardBigGameReloaded_16-10-2023_d.jpg" alt="banner" class="banner"></a></li>
            </ul>
            <div class="carousel-nav">
                <button data-active>&#x2022;</button>
                <button>&#x2022;</button>
                <button>&#x2022;</button>
                <button>&#x2022;</button>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <a href=""><img src="img/action_1.jpg" alt="ACTIE" class="boxes"></a>
                <a href=""><img src="img/action_2.png" alt="ACTIE" class="boxes"></a>
                <a href=""><img src="img/action_3.png" alt="ACTIE" class="boxes"></a>
            </div>
        </div>

        <div class="item_container">
            <h1 class="title">Veel verkochte producten!</h1>
            <div class="content">
                <?php
                include_once '../api/popular-items.php';

                foreach ($result as $row) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];

                    // if cent is 00 replace it with -
                    $productPrice = preg_replace('/.00$/', '.-', $productPrice);

                    echo "
                        <form method='post' action='index.php'>
                            <div class=\"product\">
                                <a href=\"\" class=\"info\">
                                    <h4>$productName</h4>
                                    <img src=\"/images/products/{$productImage}.jpg\" alt=\"{$productName}\" class=\"boxes\">
                                </a>
                                <div class=\"buttons\">
                                    <button type='submit' name='add' class=\"cart-button\"><i class=\"fa-solid fa-cart-shopping\"></i></button>
                                    <input type='hidden' name='product_id' value='$productId'>
                                    <span class=\"price-tag\">€{$productPrice}</span>
                                </div>
                            </div>
                        </form>
                    ";
                    }
                ?>
            </div>
        </div>

        <div class="container">
            <a href=""><img src="img/231005_banner_AlanWake2_Bundel_NVIDIA.png" alt="Headphones" class="banner"></a>
        </div>

        <div class="item_container">
            <h1 class="title">Recent verkocht!</h1>
            <div class="content">
                <?php
                include_once '../api/recent_verkocht.php';

                foreach ($result as $row) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];

                    // if cent is 00 replace it with -
                    $productPrice = preg_replace('/.00$/', '.-', $productPrice);

                    echo "
                        <form method='post' action='index.php'>
                            <div class=\"product\">
                                <a href=\"\" class=\"info\">
                                    <h4>$productName</h4>
                                    <img src=\"/images/products/{$productImage}.jpg\" alt=\"{$productName}\" class=\"boxes\">
                                </a>
                                <div class=\"buttons\">
                                    <button type='submit' name='add' class=\"cart-button\"><i class=\"fa-solid fa-cart-shopping\"></i></button>
                                    <input type='hidden' name='product_id' value='$productId'>
                                    <span class=\"price-tag\">€{$productPrice}</span>
                                </div>
                            </div>
                        </form>
                        ";
                    }
                ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../api/add-to-cart.php"></script>
</body>

</html>