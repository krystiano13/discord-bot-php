<?php

namespace App;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

require_once './vendor/autoload.php';
require_once './key.php';

$key = (string)getKey();

$discord = new Discord([
   'token' => $key ,
   'intents' => Intents::getDefaultIntents()
]);

$discord -> on("ready", function(Discord $discord) {
    $discord -> on(Event::MESSAGE_CREATE, function(Message $message, $discord) {
        if($message -> content === "!siema") {
            $message -> reply("Siema !");
        }
    });
});

$discord -> run();