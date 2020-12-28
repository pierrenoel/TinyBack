<?php 

namespace app\controllers; 

use app\core\View;

class DashboardController
{

    public function index()
    {
        View::create('/dashboard/index');
    }
}