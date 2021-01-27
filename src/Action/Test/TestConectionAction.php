<?php

namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use App\Domain\Mail\Mail;
//Envio de emails
use App\Domain\Mail\Data\MailData;
use App\Domain\Mail\Service\SendMail;

final class TestConectionAction
{
	private $mailer;
    private $data;

	function __construct( MailData $data )
	{		
        $this->data = $data;
	}

    public function __invoke(ServerRequest $request, Response $response): Response
    {   
    	
        $this->data->setSubject('swiftmailer');
        $this->data->setTo('zesantanna@protonmail.com');
        $this->data->setFrom('jcsj2010@gmail.com');
        $this->data->setBody('array com copia');

        $this->mailer = new SendMail($this->data);
        $this->mailer->send( $this->data );

        $response->getBody()->write('teste ok');        
        return $response;
    }

}