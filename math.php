<?php

namespace App;

use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;

require_once './vendor/autoload.php';

$discord -> on(Event::MESSAGE_CREATE, function(Message $message, $discord) {
    if(strpos($message -> content, "!m") === 0){
        $content = substr($message -> content, 3);
        $content = str_replace(":", "/", $content);

        $flag = true;

        foreach(str_split($content) as $letter) {
            if(
                !is_numeric($letter) &&
                $letter !== "*" &&
                $letter !== "+" &&
                $letter !== "/" &&
                $letter !== "-" &&
                $letter !== " "
            ) {
                $flag = false;
            }
        }

        if($flag === true) {  
            $result = eval("return ".$content.";");
            $message -> reply($result);
        }
        if($flag === false) {
            $message -> reply("Podaj prawidłowe działanie!");
        }
    }
    else {
        echo "ni dziala :(";
    }
});