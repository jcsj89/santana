<?php

namespace App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class UserUpdateAction
{
    
    private $view;
    public function __construct(Twig $twig)
    {        
        $this->view = $twig;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
      $result = ['user'=>'user update action'];
      return $response->withJson($result)->withStatus(201);
    }

    
}