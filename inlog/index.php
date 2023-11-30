<?php global $conn;
include_once '../includes/globals.php' ?>
<?php
session_start();

include'../api/db/dbc.php';

if (isset($_SESSION['logged_in'])){
    header('location: ../Account/');
    exit;

}

if (isset($_POST['inloggen'])){
    $email=$_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $pepper= 'fjdsbfafdawbhflkvsvsafids';
    $stmt = $conn->prepare("SELECT id,first_name,email,password FROM user WHERE email=?  LIMIT 1");

    $stmt->bind_param('s',$email);

    if($stmt->execute()){
        $stmt->bind_result($user_id,$voornaam,$email,$dbwachtwoord);
        $stmt->store_result();

        if ($stmt->fetch()) {

            if (password_verify($pepper.$wachtwoord, $dbwachtwoord)) {
                $_SESSION['id'] = $user_id;
                $_SESSION['first_name'] = $voornaam;
                $_SESSION['email'] = $email;
                $_SESSION['logged_in'] = TRUE;
                header('location: ../Account/?message= u bent ingelogd');
            } else {
                header('location: ../inlog/?error=verkeerde wachtwoord');
            }
        }else{
            header('location: ../inlog/?error=een account met dit email adres bestaat niet');
        }
    }else{
        header('location: ../inlog/?error= Er is iets fout gegaan');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./inlog.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>NerdyGadgets | login</title>
</head>

<body>
<div class="container">
    <a href="../home/"><img class="image-container" src="../images/Logo-website.png" alt="websitelogo"></a>
    <div class="login-container">
        <div class="login-header"><b>Login</b></div>
        <form class="login-form" method="post" action="../inlog/">
            <p style="color: red" class="text-center"><?php if (isset($_GET['error'])){ echo nl2br(strip_tags($_GET['error'])); }?></p>
            <div class="form-input">
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-input">
                <input type="password" id="password" name="wachtwoord" placeholder="Wachtwoord" required>
            </div>
            <button class='button-inlog' type="submit" name="inloggen">Inloggen</button>
        </form>
        <p><b>Nog niet geregistreerd?</b> <a class="register-link" href="../register/">Klik hier</a></p>
    </div>
</div>
</body>

</html>