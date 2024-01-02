<?php include_once '../../includes/globals.php' ?>

<?php
if (!isset($_GET['id'])) header("Location: /plp/");

include_once '../../api/products.php';

$productsClass = new Product();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="../product/Productpagina.js"></script>
    <link rel="stylesheet" href="Productpag.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <script src="./addToCart.js" defer></script>
    <title>NerdyGadgets | Producten</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <!-- productpagina -->
    <?php
    $product = $productsClass->getOne(
        $_GET['id']
    );

    $row = $product->fetch_assoc();

    $productId = $row['id'];
    $productName = $row['name'];
    $productPrice = $row['price'];
    $productImage = $row['image'];
    $productCategory = $row['category'];

    // if cent is 00 replace it with -
    $productPrice = preg_replace('/.00$/', '.-', $productPrice);

    echo "
        <div class='p-container'>
            <div class='row-p'>
                <div class='col-2'>
                    <img src=/images/products/{$productImage}.jpg alt={$productName}>
                </div>
                <div class='col-2'>
                    <div class='product-info'>
                        <p class='smallcategorietekst'>$productCategory</p> <!-- category -->
                        <h2>$productName</h2> <!-- product name --> 
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
                        <button id='addToCartButton' data-id='$productId' class='button-winkelwagen'>Toevoegen aan winkelwagen</button>
                    </div>
                </div>
            </div>
        </div>
        ";

    ?>

    <div class="wrap">
        <div>
            <?php
            $productDescription = $row['description'];

            echo "
            <h2 class='pro-desc-title'>Productbeschrijving</h2>
            <p class='pro-desc'>$productDescription</p>
            ";
            ?>
        </div>

        <!------gerelateerde producten------>
        <div class="container">
            <h2 class="title">Gerelateerde producten</h2>
            <div class="row">
                <?php
                $relatedProduct = $productsClass->getRelated(
                    $row['category_id'],
                    $row['id']
                );

                foreach ($relatedProduct as $row) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];

                    // if cent is 00 replace it with -
                    $productPrice = preg_replace('/.00$/', '.-', $productPrice);

                    echo "
                        <div class='relatedProduct'>
                            <div class='content'>
                                <a href='?id=$productId'>
                                    <img src=/images/products/{$productImage}.jpg alt={$productName}>
                                    <h4>$productName</h4>
                                </a>
                                <div class='klantreviews'>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                </div>
                                <p>€$productPrice</p>
                            </div>
                        </div>
                    ";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>