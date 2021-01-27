<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
//Envio de emails
use App\Domain\Mail\Data\MailData;
use App\Domain\Mail\Service\SendMail;

final class MailAction 
{
	
	private $view;	
	private $dataMail;  

	public function __construct( Twig $twig, MailData $dataMail )
	{
		$this->view = $twig; 
		$this->dataMail = $dataMail;   
	}


	public function __invoke( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
	{               
		return $response->withHeader('Location', '/site/home')->withStatus(302);    
	}  

	public function mail( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface 
	{    
		$parsedBody = $request->getParsedBody();
		$viewData = [];

    // Build POST request:
		$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
		$recaptcha_secret = '6Ler-OcUAAAAAJKsd0wqEQJknKJ_Ge1i_lQLgio1';
		$recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
		$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
		$recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
		//$recaptcha->score >= 0.5
		if (true) {

			if ( !empty($parsedBody) ) 
			{

				$mensagem = 'Nome: ' . $parsedBody['nome'] . '<br>' . 'Email: '. $parsedBody['email'] . '<br>' .
				'Telefone: ' . $parsedBody['telefone'] . '<br>' . 'Mensagem : ' . $parsedBody['msg'];

				$this->dataMail->setBody( $mensagem );          

				$mailer = new SendMail( $this->dataMail );
				$mailer->send();

				$viewData['send'] = true;   

			}
		} else {
			$viewData['send'] = false;
		}

		return $this->view->render(
			$response,
			'contato.twig',
			$viewData
		);

	}

}//class