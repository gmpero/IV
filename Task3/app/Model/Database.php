<?php

namespace App\Model;


class Database
{
    private static $instance = null;
    private $connect;

    private function __construct()
    {
        $config = require_once "app/config/config.php";
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];
        $this->connect = new \PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    public function getConnection()
    {
        return $this->connect;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }
}