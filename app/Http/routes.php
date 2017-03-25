<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/me', ['as' => 'Bot.getMe', 'uses' => 'BotController@getMe']);
Route::get('/send', ['as' => 'Bot.sendMsg', 'uses' => 'BotController@sendMsg']);




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

});
*/