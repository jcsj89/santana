<?php
$header = [
   'alg' => 'HS256',
   'typ' => 'JWT'
];
$header = json_encode($header);
$header = base64_encode($header);

$payload = [
   'iss' => 'localhost',
   'name' => 'Jose',
   'email' => 'jcsj2010@gmail.com'
];
$payload = json_encode($payload);
$payload = base64_encode($payload);

$signature = hash_hmac('sha256',"$header.$payload",'minha-senha',true);
$signature = base64_encode($signature);

echo "$header.$payload.$signature";
