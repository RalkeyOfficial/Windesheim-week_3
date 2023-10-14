<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "nerdy_gadgets";

$conn = new mysqli($hostName, $userName, $password, $dbName);

if ($conn) {
    echo "connected";
} else {
    echo "not connected";
}
