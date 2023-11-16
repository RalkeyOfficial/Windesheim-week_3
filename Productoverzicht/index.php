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
    <link rel="stylesheet" href="Productov.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="filteren.css">
    <title>NerdyGadgets | Producten</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <h2 class="title">Producten</h2>

    <main>
        <!------productoverzicht------>
        <div class="mainContent">
            <!--filter-->
            <div class="box">
                <div class="section">
                    <b>Filteren</b>
                </div>
                <div class="divider"></div>
                <div class="opties">
                    <b>Prijs</b>
                </div>

                <div>
                    <label>
                        <input type="checkbox">
                        Hoog-laag
                    </label>
                </div>

                <div>
                    <label>
                        <input type="checkbox">
                        Laag-hoog
                    </label>
                </div>

                <div class="opties">
                    <b>Merken</b>
                </div>

                <div>
                    <label>
                        <input type="checkbox">
                        TUF
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Apple
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Samsung
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Lenovo
                    </label>
                </div>

                <div class="opties">
                    <b>Populariteit</b>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Meest verkocht
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Korting
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Featured
                    </label>
                </div>

                <div class="opties">
                    <b>Geheugen capaciteit</b>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        16 GB
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        32 GB
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        64 GB
                    </label>
                </div>

                <div class="opties">
                    <b>Opslag capaciteit</b>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        128 GB
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        256 GB
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        512 GB
                    </label>
                </div>

                <div class="opties">
                    <b>Resolutie</b>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        1920 x 1080
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        1920 x 1200
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        2560 x 1600
                    </label>
                </div>

                <div class="opties">
                    <b>Touch Screen</b>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Ja
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox">
                        Nee
                    </label>
                </div>
            </div>

            <div class="products">
                <?php

                foreach ($products as $row) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];

                    // if cent is 00 replace it with -
                    $productPrice = preg_replace('/.00$/', '.-', $productPrice);

                    echo "
                        <form class=\"product\" action='index.php' method='post'>
                            <a href=\"../Productpagina/\">
                                <img src=\"../images/products/{$productImage}.jpg\" alt=\"{$productName}\">
                                <h4>{$productName}</h4>
                            </a>
                            <div class=\"klantreviews\">
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                            </div>
                            <div class=\"buttons\">
                                <button type ='submit' name='add' class=\"cart-button\"><i class=\"fa-solid fa-cart-shopping\"></i></button>
                                <input type='hidden' name='product_id' value='$productId'>
                                <span class=\"price-tag\">€{$productPrice}</span>
                            </div>
                        </form>
                        ";
                    }   
                ?>
            </div>
        </div>

        <div class="pagina-btn">
            <a href="pagina1.html"><span>1</span></a>
            <a href="pagina2.html"><span>2</span></a>
            <a href="pagina3.html"><span>3</span></a>
            <a href="pagina4.html"><span>4</span></a>
             <a href="pagina4.html"><span>➔<!--<i class="fa fa-arrow-right"></i>--></span></a> 
        </div>
    </main>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>