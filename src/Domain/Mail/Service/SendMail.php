<?php 
namespace App\Domain\Mail\Service;

//use App\Domain\Mail\Data\MailData;
use App\Domain\Mail\Service\SwiftMailerFacade;

class SendMail
{
	private $mailer;
	//private $mailData;

	function __construct( $data )
	{		
		$this->mailer = new SwiftMailerFacade( $data );		
	}

	public function send()
	{
		$this->mailer->send();
	}
}