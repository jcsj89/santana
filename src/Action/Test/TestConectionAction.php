<?php

namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use App\Domain\Mail\mail;


final class TestConectionAction
{
	private $mail;
	function __construct(mail $mail)
	{
		$this->mail = $mail;
	}

    public function __invoke(ServerRequest $request, Response $response): Response
    {   
    	$this->mail->send();
        $response->getBody()->write('teste');        
        return $response;
    }

}