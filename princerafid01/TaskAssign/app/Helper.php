<?php
namespace App;

class Helper
{
    public static function redirect($file_name)
    {
        header('Location: ' . $file_name);
        exit();
    }
}
