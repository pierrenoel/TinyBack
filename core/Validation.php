<?php

namespace app\core;

class Validation
{
    public static function check(array $array)
    {
       foreach($array as $input => $condition)
       {
            if(isset($input) && empty($input)) header("location:".$_SERVER['HTTP_REFERER']);
            // Add sanitization!!!
       }
    }
}