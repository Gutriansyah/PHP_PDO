<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

$connection = getConnection();
$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES('bram@gmail','hoy')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('bramal@gmail','hey')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('bramul@gmail','hiy')");

$connection->commit();
$connection = null;
