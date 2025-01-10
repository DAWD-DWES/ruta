<?php

require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mapApiKey = $_ENV['MAP_API_KEY'];

$url = "http://dev.virtualearth.net/REST/V1/Routes/Driving?c=es&o=json&wp.0=madrid&wp.1=almeria&key=" . $mapApiKey;
$json = json_decode(file_get_contents($url), true);

echo "<hr>";
echo '<pre>' . var_export($json, true) . '</pre>';
echo "<hr>";

$distancia = $json['resourceSets'][0]['resources'][0]['travelDistance'];
echo "$distancia klmts.";
