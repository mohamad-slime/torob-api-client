<?php
require __DIR__ . '/../vendor/autoload.php';

use TorobApiClient\Client;
use TorobApiClient\Config;

$config = new Config();
$client = new Client($config);
$results = $client->search('A55');
print_r($results);
