<?php

namespace app\core;
use app\core\rock\Rock;

class View
{

    public static function create($view,$loop = 'null',$data = 'null')
    {
        ob_start();
        $$loop = $data;
        require_once __DIR__."/../views/$view.php";
        $content = ob_get_clean();

        require_once __DIR__."/../views/layouts/main.php";
        // Section à retravailler!
    }

    public static function redirect(string $url)
    {
        header("location:$url");
    }


}

