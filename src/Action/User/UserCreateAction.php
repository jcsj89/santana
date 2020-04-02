<?php

namespace App\Action\User;

use App\Domain\User\Data\UserCreateData;
use App\Domain\User\Service\UserCreator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use Slim\Views\Twig;
//use Slim\Http\Response;
//use Slim\Http\ServerRequest;


final class UserCreateAction 
{
    private $userCreator;
    private $view;

    public function __construct(Twig $twig, UserCreator $userCreator)
    {
        $this->userCreator = $userCreator;
        $this->view = $twig; 
    }

    public function __invoke(ServerRequest $request, Response $response): Response
    {
        return $this->view->render(
          $response,
          '/admin/user/addUser.twig'        
        );
    }

    public function newUser(ServerRequest $request, Response $response): Response
    {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Mapping (should be done in a mapper class)
        $user = new UserCreateData();
        $user->setUsername($data['username']);
        $user->setPassword($data['password']);
        $user->setUpdate_time( $user->getDateNow() );
        $user->setCreate_time( $user->getDateNow() );
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);        

        // Invoke the Domain with inputs and retain the result
        $userId = $this->userCreator->createUser($user);   

        if ($userId === false) {
            $feedback = 'Usuario não inserido';
        }            

        // Transform the result into the JSON representation
        $result = [
            'user_id' => $userId                      
        ];

        // Build the HTTP response with JSON
        //return $response->withJson($result)->withStatus(201);
        return $response->withHeader('Location', '/user/show')->withStatus(301);         
    }
}