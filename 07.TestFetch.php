<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

// * meelakukan koneksi kedatabase
$connection = getConnection();

// * query yang di input user
$username = "udin";
$password = "udin";

// * membuat query dari parameter yang di input user
$sql = "SELECT * FROM admin WHERE username = ? AND password = ? ";
// * menjalankan prepare statment
$result = $connection->prepare($sql);
// * menjalankan/mengeksekuasi query
$result->execute([$username, $password]);

// * menyimpan data yang di ambil menggunakan fetch ke dalam variable
if ($row = $result->fetch()) {
    // * mengakses data yang di ambil
    echo "Sukes Login Sebagai : " . $row["username"];
} else {
    echo "gagal";
}

var_dump($result->fetch());

$connection = null;
