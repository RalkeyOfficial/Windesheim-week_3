<?php
session_start();

include_once '../includes/globals.php';
require_once '../api/product-id-info.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="winkelwagen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>NerdyGadgets | winkelwagen</title>
</head>

<body>
    <!-- header -->
    <?php include_once ROOT . '/components/header.php' ?>

    <div id="popup">
        <div id="popup-content">
        <div id="puzzle-container"></div>
        <button onclick="closePopup()">Close</button>
        </div>
    </div>

    <h2 class="title">Mijn Winkelwagen</h2>
    <div class="wrap">
        <div class="shopping-cart">
            <?php
            $total = 0;
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $product_ids = array_column($_SESSION['cart'], 'product_id');
                $result = getData($product_ids);

                foreach ($result as $row) {
                    $productId = $row['id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = $row['image'];
                    $total = $total + (int)$productPrice;

                    echo "
                        <div class='box product-data' data-id=$productId>
                            <div class='flexbox'>
                                <img src='/images/products/{$productImage}.jpg' alt='{$productName}'>
                                <div class='left-space'>
                                    <h4>{$productName}</h4>
                                    <h4 class='productPrice'>€$productPrice</h4>
                                    <div class='voorraad'>
                                        <span class='dot'></span>
                                        <h5>Online op voorraad</h5>
                                    </div>
                                    <div class='quantity'>
                                        <a href='../api/remove-cart-item.php?id={$productId}'><i class='fa-solid fa-trash fa-2xl'></i></a>
                                        <div class='left-space'>
                                            <button class='button-decrement'><i class='fa fa-minus'></i></button>
                                            <input type='number' class='form-control input-qty' value='1' id='quantity' oninput='updateTotalCost()' disabled>
                                            <button class='button-increment'><i class='fa fa-plus'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                }
            } else {
                echo "<h3>Er zijn geen producten in jouw winkelwagen</h3>";
            }
            ?>
        </div>

        <div>
            <form class="box samenvatting" action="payment-page.php" method="post">
                <!-- winkelwagen -->
                <h1>Samenvatting</h1>
                <hr>
                <h4>Subtotaal</h4>
                <div class="flex">
                    <div class="flex">
                        <?php
                        $count = 0;
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<h4>Artikel ($count items)</h4>";
                        } else {
                            echo "<h4>Artikel (0 items)</h4>";
                        }
                        ?>
                    </div>
                    <h4>€
                        <?php
                        echo "<span class='totalCost'>$total</span>";
                        ?>
                    </h4>
                </div>

                <div class="flex">
                    <?php
                    if ($total > 1) {
                        echo '<h4>Verzendkosten</h4>';
                        echo '<h4>Gratis!</h4>';
                    }
                    ?>
                </div>

                <div class="flex">
                    <h4>Kortingscode:</h4>
                </div>
                <div class="addKorting">
                    <input type="text" id="couponCode" name="couponCode" placeholder="Kortingscode" class="kortingCodeInput">
                    <button class='button-korting' type="button-small" onclick="applyCoupon(event)">Activeer</button>
                </div>

                <hr>
                <h4>Totaal</h4>
                <div class="flex">
                    <h4>Incl. BTW</h4>
                    <h4>€
                        <?php
                        echo "<span class='totalCost'>$total</span>";
                        echo "<input id='hiddenTotal' type='hidden' name='total' value='$total' />"
                        ?>
                    </h4>

                </div>

                <hr>

                <?php
                if ($count > 0) {
                    echo "<button class='button-winkelwagen' type='submit'>Ga verder naar de kassa</button>";
                } else {
                    echo "<button class='button-winkelwagen' onclick='redirectToOverview()'>Bekijk onze producten</button>";
                }
                ?>
            </form>
        </div>
    </div>

    <!-- footer -->
    <?php include_once ROOT . '/components/footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="winkelwagen.js"></script>

    <script>
        let discountApplied = false;

        function applyCoupon(e) {
            e.preventDefault();

            if (discountApplied) {
                alert('Discount has already been applied.');
                return;
            }

            let couponCode = document.getElementById('couponCode').value.toLowerCase() || "";

            if (couponCode === hex2a('67616467657473')) {
                let discountPercentage = 10;

                let totalInclBtw = parseFloat(document.querySelector('.totalCost').innerText);
                let discountAmount = (discountPercentage / 100) * totalInclBtw;
                let discountedTotalInclBtw = totalInclBtw - discountAmount;

                [...document.querySelectorAll('.totalCost')].map(item => item.innerText = discountedTotalInclBtw.toFixed(2))
                document.getElementById('hiddenTotal').value = discountedTotalInclBtw.toFixed(2);

                discountApplied = true;

                document.querySelector("#couponCode").disabled = true;
                document.querySelector(".button-korting").disabled = true;
            } else {
                alert('Invalid coupon code.');
            }
        }

<<<<<<< HEAD
        var couponCode = document.getElementById('couponCode').value.toUpperCase();

        if (couponCode === 'GADGETS') {

            var discountPercentage = 10;


            var totalInclBtw = parseFloat(document.querySelector('.totalCost').innerText);
            var discountAmount = (discountPercentage / 100) * totalInclBtw;
            var discountedTotalInclBtw = totalInclBtw - discountAmount;


            document.querySelectorAll('.totalCost').forEach(item => item.innerText = discountedTotalInclBtw.toFixed(2));

            document.getElementById('hiddenTotal').value = discountedTotalInclBtw.toFixed(2);





            discountApplied = true;
        } else {

            alert('Invalid coupon code.');
=======
        function hex2a(hexx) {
            var hex = hexx.toString(); //force conversion
            var str = '';
            for (var i = 0; i < hex.length; i += 2)
                str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
            return str;
>>>>>>> dev
        }
    </script>

</body>

</html>