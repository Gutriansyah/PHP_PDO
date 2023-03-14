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

    // * membuat property bertipe object PDO
    private PDO $connection;

    // * membuat construct dengan parameter object PDO untuk mengisi value property
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
        // * membuat query
        $sql = "SELECT * FROM comments WHERE id = ?";
        // * melakukan prepare terhadap query
        $statment = $this->connection->prepare($sql);
        // * menjalankan atau mengeksekusi query
        $statment->execute([$id]);

        if ($row = $statment->fetch()) {
            // * mengembalikan object Model/Comment yang properti berasal dari query yang difetch
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
        // * melakukan query sql dan mengeksekusi query
        $sql = "SELECT * FROM comments";
        $statment = $this->connection->query($sql);


        $array = [];
        // * mengisi variable array dengan data yang diambil dengan function fetch
        while ($row = $statment->fetch()) {
            $array[] = new Comment(
                id: $row["id"],
                email: $row["email"],
                comment: $row["comment"]
            );
        }
        // * mengembalikan variable array
        return $array;
    }
}
