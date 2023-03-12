<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

$connection = getConnection();

$connection->exec("INSERT INTO comments(email, comment) VALUES('giri@gmail.com','hy')");
$id = $connection->lastInsertId();

echo $id;

$connection = null;
