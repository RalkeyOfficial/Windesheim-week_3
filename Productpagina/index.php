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
            <img src="images/asus1.jpg" alt="image1" id="ProductImg">
            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="images/asus1-2.jpg" alt="image2" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="images/asus1.jpg"  alt="image1" class="small-img">
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="product-info">
                <p class="smallcategorietekst">NerdyGadgets | Laptops</p>
                <h1>ASUS TUF Gaming A15 (2022)</h1>
                <h4>€1050.00</h4>
                <a href="/winkelwagen"><button class="button-winkelwagen">Toevoegen aan winkelwagen</button></a>
                <h3>Productbeschrijving</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet autem corporis iure magni molestias non quae soluta tenetur totam? A cupiditate dignissimos distinctio expedita molestiae nam perferendis perspiciatis repudiandae, rerum saepe sequi sit tempora unde voluptatem voluptates voluptatibus voluptatum? Distinctio est facilis itaque minima perspiciatis quo quos ullam ut?</p>
            </div>
        </div>
    </div>
</div>


<!------gerelateerde producten------>
<div class="p-container">
    <h2 class="title">Gerelateerde producten</h2>
    <div class="row">
        <div class="col-4">
            <a href="../Productpagina/index.php">
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
            <a href="../Productpagina/index.php">
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
            <a href="../Productpagina/index.php">
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
            <a href="../Productpagina/index.php">
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
<script>
var ProductImg = document.getElementById("ProductImg");
var smallImg = document.getElementsByClassName("small-img")

smallImg[0].onclick =function()
{
ProductImg.src = smallImg[0].src;
}
smallImg[1].onclick =function()
{
ProductImg.src = smallImg[1].src;
}
</script>

<!-- footer -->
<?php include_once ROOT . '/components/footer.php' ?>
</body>

</html>
