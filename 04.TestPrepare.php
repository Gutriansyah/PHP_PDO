<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

$connection = getConnection();

$username = "admin";
$password = "admin";
$sql = "SELECT * FROM admin username = :username AND password = :password";
$result = $connection->prepare($sql);
$result->bindParam("username", $username);
$result->bindParam("password", $password);
$result->execute();

// $succes = false;
// foreach ($result as $row) {
//     $succes = true;
//     $name = $row["username"];
// }

// if ($succes) {
//     echo "Login Berhasil  " . PHP_EOL;
// } else {
//     echo "Login Gagal" . PHP_EOL;
// }


$connection = null;
