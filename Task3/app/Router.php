<?php

namespace app;

use App\Controllers\Comment\CreateController;
use App\Controllers\Comment\IndexController;


class Router
{
    public static function run()
    {
        $index = new IndexController();
        $create = new CreateController();

        if ($_SERVER['REQUEST_URI'] == '/task3/index.php') {
            $page = 'home';
        } else {
            $page = '';
        }

        switch ($page) {
            case 'home':
                if (array_key_exists('username', $_POST) and mb_strlen($_POST['username']) and mb_strlen($_POST['message'])) {
                    $create->store();
                } else {
                    $index->show();
                }
                break;
            default:
                http_response_code(404);
                echo "Page not found";
                break;
        }
    }
}