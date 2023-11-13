<?php global $conn;
include_once '../includes/globals.php' ?>


<?php
include'../api/db/dbc.php';
session_start();

//als de gebruiker al een account heeft stuur ze naar de accountpagina
if(isset($_SESSION['logged_in'])) {
    header('location: ../Account/');
    exit;
}
if (isset($_POST['registreren'])) {
    $naam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $straatnaam = $_POST['straatnaam'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $stad = $_POST['stad'];
    $pepper= 'fjdsbfafdawbhflkvsvsafids';
    $hashed_password = password_hash($pepper.$wachtwoord, PASSWORD_ARGON2ID);
    //kijken hoeveel characters een password bevat
    if (strlen($wachtwoord) <= 7) {
        echo "<script>alert('Een wachtwoord moet minstens 8 characters bevatten')</script>";
    } //als er geen error is
    else {
        // kijken of iemand dit e-mail al heeft
        $stmt1 = $conn->prepare("SELECT count(*) From user where email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();
        // kijken of een gebruiker hetzelfde email heeft
        if ($num_rows != 0) {
            echo "<script>alert('dit email adres bestaat al')</script>";
            // als niemad dit email heeft gebruikt
        } else {
            //nieuwe user maken
            $stmt = $conn->prepare("INSERT INTO user(email,password,first_name,surname_prefix,surname,street_name,apartment_nr,postal_code,city)
                   VALUES (?,?,?,?,?,?,?,?,?)");

            $stmt->bind_param('sssssssss', $email, $hashed_password, $naam, $tussenvoegsel, $achternaam, $straatnaam, $huisnummer, $postcode, $stad);
            //als account succesvol is gemaakt
            if ($stmt->execute()) {
                $user_id = $stmt->insert_id;
                $_SESSION['id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['first_name'] = $naam;
                $_SESSION['logged_in'] = True;
                header('location: ../Account/index.php?register= Je account is aangemaakt');
                //account kon niet aangemaakt worden
            } else {
                header('location: index.php?error= momenteel kunt u geen account aanmaken');
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>NerdyGadgets | Registratie</title>
</head>

<body>
<a href="../home/index.php"><img class="image-container" src="../images/Logo-website.png" alt="websitelogo"></a>
<div class="registration-container">
    <div class="registration-header"><b>Registratie</b></div>
    <form class="registration-form" method="post" action="../register/index.php">
        <div class="form-section">
            <p><b>Persoonlijke Gegevens:</b></p>
            <div class="form-input">

                <input type="text" id="voornaam" name="voornaam" required placeholder="Voornaam">
            </div>
            <div class="form-input">

                <input type="text" id="tussenvoegsel" name="tussenvoegsel" placeholder="Tussenvoegsel">
            </div>
            <div class="form-input">

                <input type="text" id="achternaam" name="achternaam" required placeholder="Achternaam">
            </div>
            <div class="form-input">

                <input type="email" id="email" name="email" required placeholder="E-mailadres">
            </div>
            <div class="form-input">

                <input type="password" id="wachtwoord" name="wachtwoord" required placeholder="Wachtwoord">
            </div>
        </div>
        <div class="form-section">
            <p><b>Adresgegevens:</b></p>
            <div class="form-input">

                <input type="text" id="straatnaam" name="straatnaam" required placeholder="Straatnaam">
            </div>
            <div class="form-input">

                <input type="text" id="huisnummer" name="huisnummer" required placeholder="Huisnummer">
            </div>
            <div class="form-input">

                <input type="text" id="postcode" name="postcode" required placeholder="Postcode">
            </div>
            <div class="form-input">

                <input type="text" id="stad" name="stad" required placeholder="Stad">
            </div>
        </div>
        <button class='button-register' name="registreren" type="submit">Registreer</button>
    </form>
    <p><b>Heeft u al een account?</b> <a class="login-link" href="../inlog/">Klik hier</a></p>
</div>


</body>

</html>