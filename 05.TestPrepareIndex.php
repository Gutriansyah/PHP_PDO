<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

$connection = getConnection();
$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$result = $connection->prepare($sql);
// * melakukan binding saat execute
$result->execute([$username, $password]);

$succes = false;
foreach ($result as $row) {
    $succes = true;
    $name = $row["username"];
}

if ($succes) {
    echo "Login Berhasil $name" . PHP_EOL;
} else {
    echo "Login Gagal" . PHP_EOL;
}

$connection = null;
