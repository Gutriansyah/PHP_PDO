<?php

$host = "localhost";
$port = 3306;
$database = "belajar_php_database";
$username = "root";
$password = "";

// * melakukan try and catch untuk mengecek koneksi
try {
    // * memanggil object PDO untuk melakukan Koneksi ke database
    $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
    echo "Koneksi Sukses";

    // * menutup koneksi
    $connection = null;
} catch (PDOException $exception) {
    echo "Koneksi gagal" . $exception->getMessage() . PHP_EOL;
}
