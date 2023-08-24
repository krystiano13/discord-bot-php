<?php

namespace App;

use Discord\Discord;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

require_once './vendor/autoload.php';
require_once './key.php';

$key = (string)getKey();

$discord = new Discord([
   'token' => $key 
]);

$discord -> run();