<?php

require __DIR__ . "/assets/config.php";
require __DIR__ . "/../vendor/autoload.php";

use LeandroFerreiraMa\ItauAuth\Auth;

echo "<h1>GET TOKEN</h1>";

$data = (new Auth)->sandbox()->token(ITAU_CLIENT_ID, ITAU_CLIENT_SECRET);

setcookie("authItau", $data->access_token, time() + $data->expires_in, "/");
