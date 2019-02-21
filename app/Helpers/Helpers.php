<?php

namespace App\Helpers;

class Helpers
{
    public static function getUtm($path)
    {
        return preg_replace('~^(.)*\?~', '', $path);
    }
}