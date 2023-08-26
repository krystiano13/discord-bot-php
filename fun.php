<?php

namespace App;

use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;

require_once './vendor/autoload.php';

$discord -> on(Event::MESSAGE_CREATE, function(Message $message, $discord) {
    if($message -> content === "!siema") {
        $message -> reply("Siema !");
    }
});