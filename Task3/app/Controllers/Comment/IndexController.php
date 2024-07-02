<?php

namespace App\Controllers\Comment;

use App\Model\Comment;


class IndexController
{
    public function show()
    {
        $token = new \App\Model\Csrf();
        $objComment = new Comment();
        $comments = $objComment->readAll();
        include 'app/view/index.php';
    }
}