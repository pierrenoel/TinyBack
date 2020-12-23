<?php

namespace app\core;

class Application
{

    public function launch()
    {
        $this->require();
    }

    protected function require()
    {
        require_once __DIR__.'/../routes/web.php';
    }

}

