<?php

// Error reporting
error_reporting(1);
ini_set('display_errors', '1');

// Timezone
date_default_timezone_set('America/Sao_Paulo');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['templates'] = $settings['root'] . '/templates';
$settings['public'] = $settings['root'] . '/public';

$settings['db'] = [
    'driver' => 'mysql',
    //'host' => '10.14.78.199:3306',
    'host' => '192.168.0.200:3306',
    'username' => 'jose',
    'database' => 'santana',
    'password' => '0323',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'flags' => [
        // Turn off persistent connections
        PDO::ATTR_PERSISTENT => false,
        // Enable exceptions
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // Emulate prepared statements
        PDO::ATTR_EMULATE_PREPARES => true,
        // Set default fetch mode to array
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // Set character set
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
    ],
];

$settings['gmail'] = [
    'host' => 'smtp.gmail.com',
    'username' => 'jcsj2010@gmail.com',
    'password' => 'fi#0323@',
    'port' => '587'
];


// Error Handling Middleware settings
$settings['error_handler_middleware'] = [

    // Should be set to false in production
    'display_error_details' => true,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" setting.
    // For the console and unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,
];

$settings['twig'] = [

    'path_templates' => $settings['templates'],
    'path_cache' => false
];



return $settings;