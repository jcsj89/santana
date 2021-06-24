<?php
namespace App\Action\General;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

use App\Domain\Mail\Data\MailData;
use App\Domain\Mail\Service\SendMail;
use App\Domain\JSON\Service\NewsletterSave;

final class NewsLetterAction 
{
	
	private $view;  
	private $newsletterSave; 

	public function __construct( Twig $twig, MailData $dataMail, SendMail $mailer, NewsletterSave $newsletterSave )
	{
		$this->view = $twig; 
		$this->dataMail = $dataMail; 
		$this->mailer = $mailer;  
		$this->newsletterSave = $newsletterSave;
	}

	public function __invoke( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
	{               
		return $response->withHeader('Location', '/site/home')->withStatus(302);  
	}

	public function saveNewEmail(ServerRequestInterface $request, ResponseInterface $response, array $args ):ResponseInterface
	{
		
		$email = $request->getQueryParams()['emailfooter'];
		$emailBody = $request->getQueryParams()['emailbody'];
		

		
		if ( !empty($email) && $this->newsletterSave->saveNewEmail( $email ) ) {
			$this->sendMail($email);
			$viewData['send'] = TRUE;
		}else{
			$viewData['send'] = FALSE;
		}

		if ( !empty($emailBody) && $this->newsletterSave->saveNewEmail( $emailBody ) ) {
			$this->sendMail($emailBody);
			$viewData['emailBody'] = TRUE;
		}else{
			$viewData['emailBody'] = FALSE;
		}
    	
		return $this->view->render(
			$response,
			'home.twig',
			$viewData
		);			
	}

	private function sendMail($email){
		$mensagem = 'Recebemos uma nova inscrição de email pelo site. ' . '<br>' . 'Email: '. $email ;

		//Seta a mensagem completa do email
		//a classe Domain\Mail\Data\MailData
		$this->dataMail->setBody( $mensagem );          

		//Chama o serviço de envio de email (SendMail)
		//seta os dados do email, cria log de envio e envia
		$this->mailer->setData($this->dataMail);
		$this->mailer->setLog('NEWSLETTER - EMAIL: ' . $email );
		$this->mailer->send();
	}

}