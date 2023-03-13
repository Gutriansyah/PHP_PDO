<?php

use Model\Comment;
use Repository\CommentRepositoryImpl;

use function Helper\getConnection;

require_once __DIR__ . "/Helper/getConnection.php";
require_once __DIR__ . "/Model/Comment.php";
require_once __DIR__ . "/Repository/CommentRepository.php";


$connection = getConnection();
$repos = new CommentRepositoryImpl($connection);

$comment = new Comment(email: "repos@test", comment: "hy");
$newComment = $repos->insert($comment);

var_dump($newComment->getId());

// $comment = $repos->findById(10);
// var_dump($comment);  

$comment = $repos->findAll();
var_dump($comment);

$connection = null;
