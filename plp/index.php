<?php 

session_start(); 

include_once '../api/products.php';
include_once '../includes/globals.php';
include_once '../api/add-to-cart.php';

$productsClass = new Product();

$products = $productsClass->getAll(
    12,
    $_GET['search'] ?? "",
    $_GET['categorie'] ?? [],
    $_GET['order'] ?? "",
    $_GET['prijs'] ?? "",
    $_GET['minprijs'] ?? "",
    $_GET['maxprijs'] ?? ""
)
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
                <form action="/plp/">
                    <div class="section">
                        <b>Filteren</b>
                    </div>
                    <div class="divider"></div>
                    <div class="opties">
                        <b>Categorieën</b>
                    </div>
                    <div>
                        <label>
                            <!-- if the given input does exist, add a checked value -->
                            <input type="checkbox" name="categorie[]" value="1" <?= in_array("1", ($_GET['categorie'] ?? [])) ? "checked" : "" ?>>
                            Laptop
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="categorie[]" value="2" <?= in_array("2", ($_GET['categorie'] ?? [])) ? "checked" : "" ?>>
                            Phone
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="categorie[]" value="3" <?= in_array("3", ($_GET['categorie'] ?? [])) ? "checked" : "" ?>>
                            Opslag
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="categorie[]" value="4" <?= in_array("4", ($_GET['categorie'] ?? [])) ? "checked" : "" ?>>
                            Router
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="categorie[]" value="5" <?= in_array("5", ($_GET['categorie'] ?? [])) ? "checked" : "" ?>>
                            Component
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="categorie[]" value="6" <?= in_array("6", ($_GET['categorie'] ?? [])) ? "checked" : "" ?>>
                            Desktop
                        </label>
                    </div>
                    <div class="opties">
                        <b>Order</b>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="order" value="az" <?= ($_GET['order'] ?? "") == "az" ? "checked" : "" ?>>
                            A-Z
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="order" value="za" <?= ($_GET['order'] ?? "") == "za" ? "checked" : "" ?>>
                            Z-A
                        </label>
                    </div>
                    <div class="opties">
                        <b>Prijs</b>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="prijs" value="lh" <?= ($_GET['prijs'] ?? "") == "lh" ? "checked" : "" ?>>
                            Laag-hoog
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="prijs" value="hl" <?= ($_GET['prijs'] ?? "") == "hl" ? "checked" : "" ?>>
                            Hoog-laag
                        </label>
                    </div>
                    <div class="opties">
                        <b>Prijs tussen bereik</b>
                    </div>
                    <div class="price-range">
                        <label for="minPrice">€</label>
                        <input type="number" id="minPrice" name="minprijs" placeholder="0" value="<?= $_GET['minprijs'] ?? "" ?>">

                        <label for="maxPrice">tot</label>
                        <input type="number" id="maxPrice" name="maxprijs" placeholder="24999" value="<?= $_GET['maxprijs'] ?? "" ?>">
                        <button type="submit">OK</button>
                    </div>
                </form>
            </div>


            <?php

            if ($products->num_rows > 0) {
                echo "<div class=\"products\">";

                foreach ($products as $row) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];

                    // if cent is 00 replace it with -
                    $productPrice = preg_replace('/.00$/', '.-', $productPrice);

                    echo " 
                    <div class=\"product\">
                        <a href=\"product/?id=$productId\">
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
                            <button class=\"cart-button\"><i class=\"fa-solid fa-cart-shopping\"></i></button>
                            <span class=\"price-tag\">€{$productPrice}</span>
                        </div>
                    </div>
                    ";
                }

                echo "</div>";
            } else {
                echo "
                    <p class='no-products'>Geen producten beschikbaar met deze filter</p>
                ";
            }
            ?>
        </div>

        <div class="pagina-btn">
            <a href="pagina1.html"><span>1</span></a>
            <a href="pagina2.html"><span>2</span></a>
            <a href="pagina3.html"><span>3</span></a>
            <a href="pagina4.html"><span>4</span></a>
             <a href="pagina4.html"><span><i class="fa fa-arrow-right"></i></span></a> 
        </div>
    </main>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>