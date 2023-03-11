<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

// * melakukan koneksi ke database
$connection = getConnection();
// * membuat queri sql yang di tampung di variable
$sql = "SELECT id, name, email FROM customer";
// * menjalankan function query untuk mengambil data, kemudia data ditampung di dalam variabel $result
$result = $connection->query($sql);


foreach ($result as $row) {

    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];

    echo "ID = $id " . PHP_EOL;
    echo "NAME = $name " . PHP_EOL;
    echo "EMAIL = $email " . PHP_EOL;
}


// foreach ($result as $data) {
//     $datas = implode(",", $data);
//     echo $datas . PHP_EOL;
// }

// * menutup koneksi kedatabase
$connection = null;
