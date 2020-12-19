<?php

namespace app\core;

class View
{
    public static function create($view,$loop = 'null',$data = 'null')
    {
        $$loop = $data;
        require_once __DIR__."/../views/$view.php";
        return $$loop;
    }
}

