<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [
  'body' => '{"data":{"attributes":{"amount":10000,"redirect":{"success":"http://http://spes.great-site.net/reservation/payment.php","failed":"http://http://spes.great-site.net/reservation/payment.php"},"currency":"PHP","type":"gcash"}}}',
  'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Basic cGtfdGVzdF9Ud3ZaOEQ4NnA0VEszRWF1cjNTYVEzQ0Q6',
    'Content-Type' => 'application/json',
  ],
]);

echo $response->getBody();