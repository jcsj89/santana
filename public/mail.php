<?php
require_once '../vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('jcsj2010@gmail.com')
  ->setPassword('fi#0323@')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['jcsj2010@gmail.com' => 'Jose'])
  ->setTo(['zesantanna@protonmail.com', 'jcsj2010@gmail.com' => 'jr gmail'])
  ->setBody('email teste')
  ;

// Send the message
$result = $mailer->send($message);
echo "$result";
echo "/tfim";