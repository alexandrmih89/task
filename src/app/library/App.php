<?php

use \Phalcon\DI;

class App
{
    public static function clearStr($str)
    {
        return trim(htmlspecialchars($str));
    }

    public static function clearInt($int)
    {
        return abs(trim((int)$int));
    }

    public static function cut_str($str) {
        $str = strip_tags($str);
        $length = mb_strlen($str);
        if ($length > 100) {
            $str = mb_substr($str, 0, 97) . '...';
        }
        return $str;
    }
}