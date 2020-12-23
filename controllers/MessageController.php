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

    public function show($id)
    {
        $message = Message::find($id);

        View::create('messages/show','message',$message);
    }
}