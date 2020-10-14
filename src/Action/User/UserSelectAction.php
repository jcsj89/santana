<?php

namespace App\Action\User;

use App\Domain\User\Data\UserCreateData;
use App\Domain\User\Service\UserSelect;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
//use Slim\Http\Response;
//use Slim\Http\ServerRequest;
use Slim\Views\Twig;

final class UserSelectAction
{
    private $userSelect;
    private $view;
    public function __construct(Twig $twig, UserSelect $userSelect)
    {
        $this->userSelect = $userSelect;
        $this->view = $twig;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

    }

    public function selectAllUsers(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        // Invoke the Domain with inputs and retain the result
        $users = $this->userSelect->selectAllUsers();

        // Transform the result into the JSON representation
        $viewData = [
            'users' => $users,
            'session'=> session_id()           
        ];

        // Build the HTTP response with JSON
        //return $response->withJson($viewData)->withStatus(201);
        
      return $this->view->render(
          $response,
          '/admin/user/users.twig',
          $viewData
      );
  }
}