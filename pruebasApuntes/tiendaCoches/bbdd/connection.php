<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = parse_ini_file("config.ini", true);
$namebd = $config["namebd"];
$ip = $config["ip"];
$port = $config["port"];

$client = new MongoDB\Client("mongodb://$ip:$port");
$db = $client->$namebd;

?>