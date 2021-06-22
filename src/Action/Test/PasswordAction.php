<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

use Slim\Views\Twig;
use App\Password\Bcrypt;

class PasswordAction
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
			$json = json_encode($result);

			$response->getBody()->write($json);
			return $response->withHeader('Content-Type', 'application/json');
			
			
		} else {
			$result = ['user'=> 'diferente'];
			$json = json_encode($result);
			$response->getBody()->write($json);
			return $response->withHeader('Content-Type', 'application/json');
		}

		
	}	

}