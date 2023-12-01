<?php
global $conn;
include '../api/db/dbc.php';

include_once '../includes/globals.php';

session_start();

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['id']) || empty($_SESSION['logged_in']) || empty($_SESSION['id'])) {
    header('location: login');
    exit;
}

function update()
{
    global $_POST, $conn;

    $voornaam = $_POST['voornaam'] ?? "";
    $tussenvoegsel = $_POST['tussenvoegsel'] ?? "";
    $achternaam = $_POST['achternaam'] ?? "";
    $email = $_POST['email'] ?? "";
    $wachtwoord = $_POST['wachtwoord'] ?? "";
    $newWachtwoord = $_POST['newWachtwoord'] ?? "";
    $confirmWachtwoord = $_POST['confirmwachtwoord'] ?? "";
    $straatnaam = $_POST['straatnaam'] ?? "";
    $huisnummer = $_POST['huisnummer'] ?? "";
    $postcode = $_POST['postcode'] ?? "";
    $stad = $_POST['stad'] ?? "";

    $pepper = 'fjdsbfafdawbhflkvsvsafids';

    if (!isset($wachtwoord) || empty($wachtwoord)) {
        header('location: ?error= U heeft geen wachtwoord megegeven');
        return;
    }

    // password verification
    $query = "
    SELECT password
    FROM user
    WHERE id = ?
    LIMIT 1
    ";
    $result = $conn->execute_query($query, [$_SESSION['id']]);
    $row = $result->fetch_assoc();

    if (!password_verify($pepper . $wachtwoord, $row['password'])) {
        header('location: ?error= Wachtwoord incorrect');
        return;
    }

    // update generic data
    $stmt = $conn->prepare("
        UPDATE user SET first_name = ?,surname_prefix = ?,surname = ?, email = ?,street_name = ?,apartment_nr = ?,postal_code = ?, city = ?
        WHERE id = ?
    ");
    $stmt->bind_param('sssssssss', $voornaam, $tussenvoegsel, $achternaam, $email, $straatnaam, $huisnummer, $postcode, $stad, $_SESSION['id']);

    if ($stmt->execute()) {
        // update session name and email just to be sure
        $result = $conn->execute_query("SELECT first_name, email FROM user WHERE id = ?", [$_SESSION['id']])->fetch_assoc();

        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['email'] = $result['email'];
    } else {
        header('location: ?error= Er is een fout gebeurd.');
        return;
    }

    // update password
    if (!isset($confirmWachtwoord) || !isset($newWachtwoord) || empty($confirmWachtwoord) || empty($newWachtwoord)) {
        return; // DO NOT remove this if statement and return. it WILL fuck up your password
    }

    if ($confirmWachtwoord !== $newWachtwoord) {
        header('location: ?error= De wachtwoord komt niet overeen met de wachtwoord bevestiging');
        return;
    }

    if (strlen($wachtwoord) <= 7) {
        header('location: ?error= De wachtwoord moet minstens 8 characters bevatten');
        return;
    }

    $hashed_password = password_hash($pepper . $newWachtwoord, PASSWORD_ARGON2ID);

    $stmt = $conn->prepare("
        UPDATE user SET password = ?
        WHERE id = ?
    ");
    $stmt->bind_param('ss', $hashed_password, $_SESSION['id']);

    if ($stmt->execute()) {
        // mogelijk success code
    } else {
        header('location: ?error= Er is een fout gebeurd.');
    }
}

if (isset($_POST['opslaan'])) {
    // this is so i am able to quit the execution of code without it being destructive to the rest that does need to run
    update();
}


$query = "
SELECT first_name, surname_prefix, surname, email, street_name, apartment_nr, postal_code, city
FROM user
WHERE id = ?
LIMIT 1
";

$result = $conn->execute_query($query, [$_SESSION['id']]);

$row = $result->fetch_assoc();
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
        <a href="../home/" class="image-container">
            <img src="../images/Logo-website.png" alt="websitelogo">
        </a>
        <div class="registration-container">
            <p class="berichttext" style="color: red"><?= nl2br(strip_tags($_GET['error'] ?? "")) ?></p>
            <p class="berichttext" style="color: #2776ea"><?= nl2br(strip_tags($_GET['message'] ?? "")) ?></p>

            <div class="registration-header"><b>Mijn gegevens</b></div>

            <form class="registration-form" method="post" action="../mijngegevens/">
                <div class="form-input">
                    <input type="text" id="voornaam" name="voornaam" required placeholder="voornaam *" value="<?= $row['first_name'] ?? "" ?>">
                    <input type="text" id="tussenvoegsel" name="tussenvoegsel" placeholder="tussenvoegsels" value="<?= $row['surname_prefix'] ?? "" ?>">
                    <input type="text" id="achternaam" name="achternaam" required placeholder="achternaam *" value="<?= $row['surname'] ?? "" ?>">
                    <input type="email" id="email" name="email" required placeholder="email *" value="<?= $row['email'] ?? "" ?>">
                </div>
                <div class="form-input">
                    <input type="text" id="straatnaam" name="straatnaam" placeholder="straatnaam" value="<?= $row['street_name'] ?? "" ?>">
                    <input type="text" id="huisnummer" name="huisnummer" placeholder="huisnummer" value="<?= $row['apartment_nr'] ?? "" ?>">
                    <input type="text" id="postcode" name="postcode" placeholder="postcode" value="<?= $row['postal_code'] ?? "" ?>">
                    <input type="text" id="stad" name="stad" placeholder="stad" value="<?= $row['city'] ?? "" ?>">
                </div>
                <div class="form-input">
                    <input type="password" id="wachtwoord" name="wachtwoord" required placeholder="Wachtwoord *">
                    <input type="password" id="wachtwoord" name="newWachtwoord" placeholder="Nieuwe wachtwoord">
                    <input type="password" id="wachtwoord" name="confirmwachtwoord" placeholder="Wachtwoord bevestiging">
                </div>

                <button class='button-register' name="opslaan" type="submit">Opslaan</button>
            </form>

            <p><b>Wilt u terug?</b> <a class="login-link" href="../account/">Klik hier</a></p>
        </div>
    </div>
</body>

</html>