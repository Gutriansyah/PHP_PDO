<?php

use Model\Comment;
use Repository\CommentRepositoryImpl;

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";
require_once __DIR__ . "/Model/Comment.php";
require_once __DIR__ . "/Repository/CommentRepository.php";

// * memanggil fungsi koneksi ke database yang disimpan ke dalam variable $connection
$connection = getConnection();
// * memanggil object class Comment Repository yang memiliki parameter bertipe PDO 
$repository = new CommentRepositoryImpl($connection);

// * membuat object dari class Model/Comment beserta parameternya
$comment = new Comment(email: "rom@test", comment: "hyyy");
// * memanggil function insert dari object repository yang memiliki parameter bertipe object Comment
$newComment = $repository->insert($comment);
// * kenapa di vardump new comment
var_dump($newComment->getId()) . PHP_EOL;
var_dump($newComment->getEmail()) . PHP_EOL;
var_dump($newComment->getComment()) . PHP_EOL;

// $comment = $repository->findById(10);
// var_dump($comment);

// $comment = $repository->findAll();
// var_dump($comment);

$connection = null;
