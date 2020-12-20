<?php

namespace app\migrations;
use app\core\Migration;

class ArticleMigration extends Migration
{
    public function run()
    {
        Migration::new(
            [
                'id' => 'text',
                'title' => 'text',
                'content' => 'text',
                'created_at' => 'datatime',
                'update_at' => 'datetime'
            ]
        );
    }
}
