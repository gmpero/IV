<?php

namespace App\Model;

use App\Model\Csrf;
use App\Model\Database;
use App\Model\InputFilter;

class Comment
{
    private $db;


    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function readAll(): array
    {
        $result = $this->db->query("SELECT * FROM comments");
        $comments = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = $row;
        }

        return $comments;
    }


    public function create($name, $message, $token)
    {
        if (Csrf::validateToken($token)) {
            $username = InputFilter::clean($name);
            $text = InputFilter::clean($message);

            $statement = $this->db->prepare("INSERT INTO comments (username, message) VALUE (?,?)");

            $statement->bindParam(1, $username, \PDO::PARAM_STR);
            $statement->bindParam(2, $text, \PDO::PARAM_STR);

            return $statement->execute();
        }
        return 0;
    }
}
