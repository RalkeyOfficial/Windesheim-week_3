<?php global $conn;
include_once '../includes/globals.php' ?>
<?php
include'../api/db/dbc.php';
session_start();


if (isset($_POST['opslaan'])) {
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $confirmwachtwoord = $_POST['confirmwachtwoord'];
    $straatnaam = $_POST['straatnaam'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $stad = $_POST['stad'];
    $pepper= 'fjdsbfafdawbhflkvsvsafids';
    $hashed_password = password_hash($pepper.$wachtwoord, PASSWORD_ARGON2ID);
    if ($confirmwachtwoord !== $wachtwoord) {
        header('location: ../mijngegevens/?error= De wachtwoord komt niet overeen met de wachtwoord bevestiging');
    } //kijken hoeveel characters een password bevat
    elseif (strlen($wachtwoord) <= 7) {
        header('location: ../mijngegevens/.php?error= Een wachtwoord moet minstens 8 characters bevatten');
    } //als er geen error is
    else {
        $stmt=$conn->prepare("UPDATE user SET first_name = ?,surname_prefix = ?,surname = ?, email = ?,password = ?,street_name = ?,apartment_nr = ?,postal_code = ?, city = ? WHERE email=?");
        $stmt->bind_param('ssssssssss', $voornaam, $tussenvoegsel, $achternaam, $email, $hashed_password, $straatnaam, $huisnummer, $postcode, $stad, $email);

        if ($stmt->execute()){
            header('location: ../mijngegevens/?message= uw gegevens zijn aangepast');
        }else{
            header('location: ../mijngegevens/?error= uw gegevens konden niet aangepast worden');
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./mijngegevens.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>NerdyGadgets | Mijn Gegevens</title>
</head>

<body>
<div class="container">
    <a href="../home/">
        <img class="image-container" src="../images/Logo-website.png" alt="websitelogo">
    </a>
    <div class="registration-container">
        <p class="berichttext" style="color: red"><?php if (isset($_GET['error'])){echo $_GET['error'];}?></p>
        <p class="berichttext" style="color: #2776ea"><?php if (isset($_GET['message'])){echo $_GET['message'];}?></p>
        <div class="registration-header"><b>Mijn gegevens</b></div>
        <form class="registration-form" method="post" action="../mijngegevens/">
            <div class="form-input">
                <input type="text" id="voornaam" name="voornaam" required placeholder="<?php if (isset($_SESSION['first_name'])){ echo $_SESSION['first_name'];} ?>">
            </div>
            <div class="form-input">
                <input type="text" id="tussenvoegsel" name="tussenvoegsel" placeholder="<?php if (isset($_SESSION['surname_prefix'])){ echo $_SESSION['surname_prefix'];} ?> ">
            </div>
            <div class="form-input">
                <input type="text" id="achternaam" name="achternaam" required placeholder="<?php if (isset($_SESSION['surname'])){ echo $_SESSION['surname'];} ?>">
            </div>
            <div class="form-input">
                <input type="email" id="email" name="email" required placeholder="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>">
            </div>
            <div class="form-input">
                <input type="password" id="wachtwoord" name="wachtwoord" required placeholder="Wachtwoord">
            </div>
            <div class="form-input">
                <input type="password" id="wachtwoord" name="confirmwachtwoord" required placeholder="Wachtwoord bevestiging">
            </div>
            <div class="form-input">
                <input type="text" id="voornaam" name="straatnaam" required placeholder="<?php if (isset($_SESSION['street_name'])){ echo $_SESSION['street_name'];} ?>">
            </div>
            <div class="form-input">
                <input type="text" id="voornaam" name="huisnummer" required placeholder="<?php if (isset($_SESSION['apartment_nr'])){ echo $_SESSION['apartment_nr'];} ?>">
            </div>
            <div class="form-input">
                <input type="text" id="voornaam" name="postcode" required placeholder="<?php if (isset($_SESSION['postal_code'])){ echo $_SESSION['postal_code'];} ?>">
            </div>
            <div class="form-input">
                <input type="text" id="voornaam" name="stad" required placeholder="<?php if (isset($_SESSION['city'])){ echo $_SESSION['city'];} ?>">
            </div>
            <button class='button-register' name="opslaan" type="submit">Opslaan</button>
        </form>
        <p><b>Wilt u terug?</b> <a class="login-link" href="../Account/">Klik hier</a></p>
    </div>
</div>
</body>
</html>
