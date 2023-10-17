<?php

$env = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/.env');

$conn = new mysqli(
    $env["DB_HOST"],
    $env["DB_USER"],
    $env["DB_PASS"],
    $env["DB_NAME"]
);
