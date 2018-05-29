<?php

$url      = 'https://fcm.googleapis.com/fcm/send';
$API_KEY  = 'AAAAfu7OG5o:APA91bHiiP7GaAQgLbWDVy-k4-7S_Xqnu6fe-GmUdZetHA2zYQOwaqQ-bF96ZWw1-Z5pnymqdre7TwKTrPYpqZx_qMMiUhQ1I2x-wRzRy0pDA1jm3Fms3oqvScjVY7EphGw55xPRad36';
$TOKEN_ID = 'cGkXnWJDcvA:APA91bEgXzOvo1gzOyITY0dufl0f9w7lGBBbI2YC8VfgNr8667dwo2lF891zaQVAogfclLXJ0gjCN2jPmI2c8rQd3j9aK6Gt8uP4A640IqW7e403T1owUGSC7wT9zf47BOK7s2A3VYAT';

$request_body = [
    'to' => $TOKEN_ID,
    'notification' => [
        'title' => 'Ералаш',
        'body' => sprintf('Начало в %s.', date('H:i')),
        'icon' => 'https://eralash.ru.rsz.io/sites/all/themes/eralash_v5/logo.png?width=192&height=192',
        'click_action' => 'http://eralash.ru/',
    ],
];
$fields = json_encode($request_body);

$request_headers = [
    'Content-Type: application/json',
    'Authorization: key=' . $API_KEY,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
curl_close($ch);

echo $response;