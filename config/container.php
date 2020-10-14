<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Selective\BasePath\BasePathMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

//PhpMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },

    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get('settings')['error'];

        return new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool)$settings['display_error_details'],
            (bool)$settings['log_errors'],
            (bool)$settings['log_error_details']
        );
    },

    BasePathMiddleware::class => function (ContainerInterface $container) {
        return new BasePathMiddleware($container->get(App::class));
    },

    PDO::class => function (ContainerInterface $container) {
    $settings = $container->get('settings')['db'];

    $host = $settings['host'];
    $dbname = $settings['database'];
    $username = $settings['username'];
    $password = $settings['password'];
    $charset = $settings['charset'];
    $flags = $settings['flags'];
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    return new PDO($dsn, $username, $password, $flags);
    },

    // Twig templates
    Twig::class => function (ContainerInterface $container) {
        $settings = $container->get('settings');
        $twigSettings = $settings['twig'];

        $options = $twigSettings['options'];
        $options['cache'] = $options['cache_enabled'] ? $options['cache_path'] : false;

        $twig = Twig::create($twigSettings['paths'], $options);

        // Add extension here
        // ...
        
        return $twig;
    },

    TwigMiddleware::class => function (ContainerInterface $container) {
        return TwigMiddleware::createFromContainer(
            $container->get(App::class),
            Twig::class
        );
    },

    PHPMailer::class => function (ContainerInterface $container)
    {
        $config = $container->get(Configuration::class);

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    // Enable verbose debug output
    $mail->isSMTP();    // Send using SMTP
    $mail->Host       = $config->getString('gmail.host');   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;   // Enable SMTP authentication
    $mail->Username   = $config->getString('gmail.username');   // SMTP username
    $mail->Password   = $config->getString('gmail.password');   // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $config->getString('gmail.port');   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    return $mail;
    },
];