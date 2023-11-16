<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["payment_method"])) {
        $paymentMethod = $_POST["payment_method"];
        switch ($paymentMethod) {
            case "credit_card":
                handleCreditCardPayment();
                break;

            case "paypal":
                handlePayPalPayment();
                break;

            case "ideal":##
                if (isset($_POST["ideal_bank"])) {
                    $idealBank = $_POST["ideal_bank"];
                    handleIdealPayment($idealBank);
                } else {
                    handlePaymentError("Selecteer een iDEAL-bank.");
                }
                break;

            default:
                handlePaymentError("Onbekende betaalmethode.");
        }
    } else {
        handlePaymentError("Selecteer een betaalmethode, alstublieft.");
    }
} else {
    handlePaymentError("Ongeldige verzoekmethode.");
}

function handleCreditCardPayment()
{
    echo "<script>alert('Creditcardbetaling succesvol verwerkt!');";
    echo "window.location.href = '../home/index.php';</script>";
}

function handlePayPalPayment()
{
    echo "<script>alert('PayPal-betaling succesvol verwerkt!');";
    echo "window.location.href = '../home/index.php';</script>";
}

function handleIdealPayment($bank)
{
    echo "<script>alert('iDEAL-betaling succesvol verwerkt met bank: $bank!');";
    echo "window.location.href = '../home/index.php';</script>";
}

function handlePaymentError($errorMessage)
{
    echo "<script>alert('$errorMessage');";
    echo "window.location.href = '../home/index.php';</script>";
}

?>