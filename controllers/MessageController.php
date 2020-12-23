<?php 

namespace app\controllers; 

use app\core\View;
use app\models\Message;

class MessageController
{
    public function index()
    {
        $messages = Message::all();
        View::create('messages/index','messages',$messages);
    }
}