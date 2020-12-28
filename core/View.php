<?php

namespace app\core;
use app\core\rock\Rock;

class View
{

    public static function create($view,$loop = 'null',$data = 'null')
    {
        ob_start();
        // Send data to the view if exist
        $$loop = $data;
        // I start the session
        session_start();
        // Require the right view
        require_once __DIR__."/../views/$view.php";

        $content = ob_get_clean();

        if($protected == true)
        {
            if($_SESSION['connected'] == false){
                View::redirect('/login');
            }
        }


        require_once __DIR__."/../views/layouts/main.php";

        // Need to improve this section, cause the code is horrible!!
    }

    public static function redirect(string $url)
    {
        header("location:$url");
    }


}

