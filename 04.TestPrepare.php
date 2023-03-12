<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

$connection = getConnection();
$username = "admin";
$password = "admin";


// * melakukan prepare query
$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
$result = $connection->prepare($sql);
$result->bindParam("username", $username);
$result->bindParam("password", $password);
$result->execute();

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
