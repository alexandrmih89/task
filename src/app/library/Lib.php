<?php

class Lib
{
    public static function generatePassword()
    {
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $password .= rand(0, 9);
        }
        return $password;
    }

    public static function pr($data)
    {
        echo '<pre>' . print_r($data, 1) . '</pre>';
    }
}