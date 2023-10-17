<?php include_once '../includes/globals.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="../Productpagina/Productpagina.js"></script>
    <link rel="stylesheet" href="Productpag.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>NerdyGadgets | Producten</title>
</head>

<body>
<!-- header -->
<?php include_once ROOT . '/components/header.php' ?>

<!-------productpagina-------->
<div class="p-container">
    <div class="row-p">
        <div class="col-2">
            <img src="images/asus1.jpg" alt="image1">
        </div>
        <div class="col-2">
            <div class="product-info">
                <p class="smallcategorietekst">Laptops</p>
                <h1>ASUS TUF Gaming A15 (2022)</h1>
                <h4>€1050.00</h4>
                <a href="/winkelwagen"><button class="button-winkelwagen">Toevoegen aan winkelwagen</button></a>
                <h3>Productbeschrijving</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet autem corporis iure magni molestias non quae soluta tenetur totam? A cupiditate dignissimos distinctio expedita molestiae nam perferendis perspiciatis repudiandae, rerum saepe sequi sit tempora unde voluptatem voluptates voluptatibus voluptatum? Distinctio est facilis itaque minima perspiciatis quo quos ullam ut?</p>
            </div>
        </div>
    </div>
</div>

<div class="wrap">
    <!------Product beoordeling------>
    <div class="container">
        <h2 class="title">Recenties</h2>
        <div class="box">
            <div class="review">
                <div class="evenly">
                    <div class="klantreviews">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h5>17/10/2023</h5>
                </div>
                <form action="">
                    <label for="title">Titel: </label>
                    <input type="text" id="title" name="title"><br><br>
                    <label for="cname">Klantnaam: </label>
                    <input type="text" id="cname" name="cname"><br><br>
                    <textarea id="w3review" name="productreview" rows="6" cols="70rem">Schrijf in dit tekstvak uw recentie over dit product.</textarea>
                    <br>
                    <input class="button-winkelwagen" type="submit" value="Submit">
                </form>
            </div>
        </div>

        <div class="box">
            <div class="review">
                <div class="evenly">
                    <div class="klantreviews">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h5>14/10/2023</h5>
                </div>
                <h2>Product titel</h2>
                <h4>Klantnaam</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type.</p>
                <div class="behulpzaam">
                    <div>Behulpzaam?</div>
                    <div>Ja(0)</div>
                    <div>Nee(0)</div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="review">
                <div class="evenly">
                    <div class="klantreviews"> 
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h5>14/10/2023</h5>
                </div>
                <h2>Product titel</h2>
                <h4>Klantnaam</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type.</p>
                <div class="behulpzaam">
                    <div>Behulpzaam?</div>
                    <div>Ja(0)</div>
                    <div>Nee(0)</div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="review">
                <div class="evenly">
                    <div class="klantreviews"> 
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h5>14/10/2023</h5>
                </div>
                <h2>Product titel</h2>
                <h4>Klantnaam</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type.</p>
                <div class="behulpzaam">
                    <div>Behulpzaam?</div>
                    <div>Ja(0)</div>
                    <div>Nee(0)</div>
                </div>
            </div>
        </div>
        <div class="readmore">
            <button class="button-winkelwagen" onclick="myFunction()" id="myBtn">Read more</button>
        </div>
    </div>

    <!------gerelateerde producten------>
    <div class="container">
        <h2 class="title">Gerelateerde producten</h2>
        <div class="row">
            <div class="col-4">
                <a href="../Productpagina/">
                    <img src="images/asus1.jpg" alt="product">
                </a>
                <h4>Asus Tuf Gaming A15</h4>
                <div class="klantreviews">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>€1050.00</p>
            </div>
            <div class="col-4">
                <a href="../Productpagina/">
                    <img src="images/asus2.jpg" alt="product">
                </a>
                <h4>ASUS X415EA-EB1510W</h4>
                <div class="klantreviews">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>€700.00</p>
            </div>
            <div class="col-4">
                <a href="../Productpagina/">
                    <img src="images/asus3.jpg" alt="product">
                </a>
                <h4>ASUS Vivobook 15</h4>
                <div class="klantreviews">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>€800.00</p>
            </div>
            <div class="col-4">
                <a href="../Productpagina/">
                    <img src="images/asus4.jpg" alt="product">
                </a>
                <h4>ASUS Vivobook 16</h4>
                <div class="klantreviews">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>€850.00</p>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>
