<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";


$connection = getConnection();
$username = "admin";
$password = "admin";
$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$statment = $connection->query($sql);

$succes = false;
$find_user = null;
foreach ($statment as $row) {
    $succes = true;
    $find_user = $row["username"];
    // echo $username = $row["username"] . PHP_EOL;
    // echo $password = $row["password"] . PHP_EOL;
}

// * cek apakan username dan password yang di input sesaui denggan database
if ($succes) {
    echo " Login Berhasil " . $find_user . PHP_EOL;
} else {
    echo "Login GAGAl" . PHP_EOL;
}


$connection = null;
