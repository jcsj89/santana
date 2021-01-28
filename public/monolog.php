<?php
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('teste');
$log->pushHandler(new StreamHandler('../logs/testes.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');
echo "Logger ok";
?>