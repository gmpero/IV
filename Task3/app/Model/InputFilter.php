<?php

namespace App\Model;
class InputFilter
{
    public static function clean($data): string
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);

        return $data;
    }
}