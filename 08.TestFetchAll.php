<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";


$connection = getConnection();

$sql = "SELECT * FROM customer";
$result = $connection->query($sql);

// * mengambil seluruh data menggunakan fetch all
$customer = $result->fetchAll();


var_dump($customer);

$connection = null;
