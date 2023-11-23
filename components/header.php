<style>
    <?php include_once ROOT . '/components/header.css' ?>
</style>
<script src="https://kit.fontawesome.com/ee85149100.js" crossorigin="anonymous"></script>

<header>
    <div class="head">
        <a href="../../../../../../home/" class="logo">
            <img src="../../../../../../images/Logo-website.png" alt="">
            <h1>Nerdy Gadgets</h1>
        </a>
        <form action="/plp/" class="search">
            <input type="text" name="search" placeholder="search products" value="<?php echo $_GET['search'] ?? "" ?>">
            <button type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i></button>
        </form>
        <div class="buttons">
            <a href="../inlog/"><i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i></a>
            <a href="/winkelwagen/"><i class="fa-solid fa-cart-shopping fa-2xl" style="color: #ffffff;"></i></a>
        </div>
    </div>
    <div class="separator"></div>
    <div class="navbar">
        <div>
            <div class="dropdown">
                <button>
                    Categorieën
                    <span><i class="fa-solid fa-caret-down" style="color: #ffffff;"></i></span>
                </button>
                <div class="dropdown-content">
                    <a href="/plp/?categorie%5B%5D=1">Laptops</a>
                    <a href="/plp/?categorie%5B%5D=2">Phones</a>
                    <a href="/plp/?categorie%5B%5D=3">Opslag</a>
                    <a href="/plp/?categorie%5B%5D=4">Routers</a>
                    <a href="/plp/?categorie%5B%5D=5">Componenten</a>
                    <a href="/plp/?categorie%5B%5D=6">Desktops</a>
                </div>
            </div>
            <a class="navItem" href="/plp/">Producten</a>
            <a class="navItem" href="/over-ons/">over ons</a>
        </div>
    </div>
</header>