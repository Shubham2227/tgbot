<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Telegram;

class BotController extends Controller
{
    /*
Route::get('getMe', function() {
    $response = Telegram::getMe();

    $botId = $response->getId();
    $firstName = $response->getFirstName();
    $username = $response->getUsername();
    echo $botId . " " . $firstName . " " . $username;
});
Route::get('getlatest', function() {
    $messages = Telegram::getUpdates();
    /* foreach($messages as $message) {
         $chatId = $message['message']['chat']['id'];
         echo $message . "<br>";
     }*/
    /*
    $messages = end($messages);
    foreach($messages as $message) {
        $chatId =  $message['chat']['id'];
        echo $chatId;
    }
});
Route::get('sendMsg/{msg}', function($msg) {
    $response = Telegram::sendMessage([
        'chat_id' => '-153611506',
        'text' => $msg
    ]);

    $messageId = $response->getMessageId();
    echo $messageId;

});*/

    public function getMe()
    {
        $response = Telegram::getMe();
        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();
        echo $botId . "<br>" . $firstName . "<br>" . $username;
    }

    public function getAllMsgs()
    {
        $messages = Telegram::getUpdates();
        return $messages;
    }

    public function getLastMsg()
    {

        $allMsgs = $this->getAllMsgs();
        $message = end($allMsgs);
        return ['chatId' =>$message['message']['chat']['id'], 'message' => $message['message']['text']];

    }

    public function sendMsg() {
        $chatId = $this->getLastMsg()['chatId'];
        $message = $this->getLastMsg()['message'];
        $response = Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $message
        ]);

        $messageId = $response->getMessageId();
        echo $messageId;

    }

}
