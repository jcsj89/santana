<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use App\Action\Action;
use Slim\Views\Twig;
use App\Password\Bcrypt;

class PasswordAction extends Action
{
	private $view; 


	public function __construct(Twig $twig)
	{
		$this->view = $twig;  

	}

	public function __invoke(ServerRequest $request, Response $response): Response
	{
		$senha = 'meusPais123123123';
		$hash = Bcrypt::hash($senha);   	
		

		if (Bcrypt::check($hash, $hash)) {
			$result = ['user'=> $hash];
			return $response->withJson($result)->withStatus(201);
		} else {
			$result = ['user'=> 'diferente'];
			return $response->withJson($result)->withStatus(201);
		}

		
	}	

}