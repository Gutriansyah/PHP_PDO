<?php

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";

// * membuat koneksi ke database
$connection = getConnection();

// * membuat query yang disimpan di dalam variabel
$sql =  <<< sql
    INSERT INTO customer(id, name ,email)
    VALUES ('bram', 'Bram' , 'Bram@gamil.com')
sql;


// * menggunakan function exec() untuk mengeksekusi query 
// * parameter berupa variable yang berisi query
$connection->exec($sql);

// * memutuskan koneksi ke database
$connection = null;
