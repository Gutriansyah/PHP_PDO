<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

$connection = getConnection();
$username = "udin";
$password = "udin";

// * melakukan prepare non query
$sql = "INSERT INTO admin(username, password) VALUES (:username, :password)";
$result = $connection->prepare($sql);
$result->bindParam("username", $username);
$result->bindParam("password", $password);
$result->execute();
