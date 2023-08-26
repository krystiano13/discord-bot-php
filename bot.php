<?php

namespace App;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;
use LangleyFoxall\MathEval\MathEvaluator;

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

        if(strpos($message -> content, "!m") === 0){
            $content = substr($message -> content, 3);

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
});

$discord -> run();