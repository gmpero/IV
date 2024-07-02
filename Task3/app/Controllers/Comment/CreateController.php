<?php

namespace App\Controllers\Comment;

use App\Model\Comment;

class CreateController
{
    public function store()
    {
        $comment = new Comment();
        $comment->create($_POST['username'], $_POST['message'], $_POST['token']);
        unset($_POST);
        header("Location: index.php");
    }
}