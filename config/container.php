<?php

use Psr\Container\ContainerInterface;
use Selective\Config\Configuration;
use Slim\App;
use Slim\Factory\AppFactory;
//use PDO;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;
//PhpMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

return [
    Configuration::class => function () {
        return new Configuration(require __DIR__ . '/settings.php');
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        $app = AppFactory::create();
        

        // Optional: Set the base path to run the app in a sub-directory
        // The public directory must not be part of the base path
        //$app->setBasePath('/QuimicaIpigua');


        return $app;
    },
    
    PDO::class => function (ContainerInterface $container) {
        $config = $container->get(Configuration::class);

        $host = $config->getString('db.host');
        $dbname =  $config->getString('db.database');
        $username = $config->getString('db.username');
        $password = $config->getString('db.password');
        $charset = $config->getString('db.charset');
        $flags = $config->getArray('db.flags');
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        return new PDO($dsn, $username, $password, $flags);
    },

    Twig::class => function (ContainerInterface $container) {
        $config = $container->get(Configuration::class);

        $path_templates = $config->getString('twig.path_templates');
        $path_cache = $config->getString('twig.path_cache');
        

        $loader = new FilesystemLoader(
            $path_templates
        );
        $options = [
          //  'cache' => $path_cache
        ];

        $view = new Twig(
            $loader,
            $options
        );

        return $view;
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