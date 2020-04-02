<?php

namespace App\Action\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
//use Slim\Http\Response;
//use Slim\Http\ServerRequest;
use Slim\Views\Twig;

final class UserUpdateAction
{
    
    private $view;
    public function __construct(Twig $twig)
    {        
        $this->view = $twig;
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {
      $result = ['user'=>'user update action'];
      return $response->withJson($result)->withStatus(201);
    }

    
}