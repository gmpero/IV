<?php

namespace App\Model;
class Csrf
{
    protected $_token;

    public function __construct()
    {
        $this->_token = !empty($_SESSION['token']) ? $_SESSION['token'] : $this->createToken();
    }

    public function getToken()
    {
        return $this->_token;
    }

    public function createToken()
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($chars) - 1;
        $token = '';

        for ($i = 0; $i < 28; $i++) {
            $token .= $chars[rand(0, $max)];
        }

        $token = md5($token . session_name());

        $_SESSION['token'] = $token;

        return $token;
    }

    public static function validateToken($token): bool
    {
        return hash_equals($token, $_SESSION['token']);
    }
}