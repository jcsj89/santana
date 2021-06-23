<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

use Slim\Views\Twig;

use App\Domain\Pessoa\Data\PessoaCreateData;
use App\Domain\Pessoa\Data\EmailCreateData;
use App\Domain\Pessoa\Data\EnderecoCreateData;
use App\Domain\Pessoa\Data\TelefoneCreateData;


use App\Domain\User\Data\UserCreateData;

class TestUser
{
	private $view; 


	public function __construct(Twig $twig)
	{
		$this->view = $twig;  

	}

	public function __invoke(ServerRequest $request, Response $response): Response
	{
		$pessoa = new PessoaCreateData();
		$pessoa->setNome('jose santana');

		$email = new EmailCreateData();
		$email->setEmail('jcsj@gmail.com');		

		$end = new EnderecoCreateData();
		$tel = new TelefoneCreateData();

		$pessoa->setEmails($email);
		$pessoa->setEmails($email);

		/*
		$user = new UserCreateData();		
		$user->getPessoa()->nome = 'jose';
		$user->getPessoa()->email_id[0]->setEmail('jcsj');
*/
		$array = [
			'pessoa' => print_r($pessoa),
			'email' => print_r($email),
			'endereco' => print_r($end),
			'tel' => print_r($tel)

			//'2'=> $user->getPessoa()->email_id[0],
			//'3'=> $user->getPessoa()->email_id[0],
			//'4'=> print_r($user->getPessoa()->email_id )
		];
		return $response->withJson($array)->withStatus(201);		
	}	

}