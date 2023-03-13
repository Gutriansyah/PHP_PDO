<?php

namespace Repository;

// require_once __DIR__ . "../Helper/getConnection.php";

use Model\Comment;
use PDO;

use function Helper\getConnection;

interface CommentRepository
{
    function insert(Comment $comment): Comment;

    function findById(int $id): ?Comment;

    function findAll(): array;
}

// * class Comment repositroy memiliki property yang bertipe data PDO
class CommentRepositoryImpl implements CommentRepository
{

    private PDO $connection;

    // * membuat cintruc sebagai parameter object yang memiliki tipe data PDO
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    // * membuat function insert yang memiliki parameter Object Class Comment
    function insert(Comment $comment): Comment
    {
        // * membuat query sql yang valuenya berasal dari objetc comment
        $sql = "INSERT INTO comments(email, comment) VALUES (?,?)";
        // * melakukan prepare
        $statment = $this->connection->prepare($sql);
        // * melakukan esekusi perintah sql dan melakukan binding pada parameter yang diambil dari Properti class Comment
        $statment->execute([$comment->getEmail(), $comment->getComment()]);

        // * meakukan pengambilan id yang terakhir di input menggunakan function lastInsertId
        $id = $this->connection->lastInsertId();
        // * melakukan setId untuk mengisi properti dari Model/Comment dikarenkan waktu isnert kita tidak menginsertkan id 
        $comment->setId($id);

        // * melakukan return comment
        return $comment;
    }

    function findById(int $id): ?Comment
    {
        $sql = "SELECT * FROM comments WHERE id = ?";
        $statment = $this->connection->prepare($sql);
        $statment->execute([$id]);

        if ($row = $statment->fetch()) {
            return new Comment(
                id: $row["id"],
                email: $row["email"],
                comment: $row["comment"]
            );
        } else {
            return null;
        }
    }

    function findAll(): array
    {
        $sql = "SELECT * FROM comments";
        $statment = $this->connection->query($sql);

        $array = [];
        while ($row = $statment->fetch()) {
            $array[] = new Comment(
                id: $row["id"],
                email: $row["email"],
                comment: $row["comment"]
            );
        }
        return $array;
    }
}
