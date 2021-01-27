<?php 
namespace App\Domain\Mail\Service;

//use App\Domain\Mail\Data\MailData;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

/**
 * 
 */
class SwiftMailerFacade
{
	private $mail;
    private $transport;
    private $message;

    private $mailData;

    function __construct( $mailData )
    {        
    	$this->mailData = $mailData;

        $this->transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                            ->setUsername('jcsj2010@gmail.com')
                            ->setPassword('fi#0323@');

        $this->mail = new Swift_Mailer($this->transport);
        $this->message = new Swift_Message();
        $this->setMessage();
    }

    private function setMessage()
    {    	

    	// Give the message a subject
  		$this->message->setSubject( $this->mailData->getSubject() );

  		// Set the From address with an associative array
  		// ['john@doe.com' => 'John Doe']
  		$this->message->setFrom( $this->mailData->getFrom() );

  		// Set the To addresses with an associative array (setTo/setCc/setBcc)
  		//['receiver@domain.org', 'other@domain.org' => 'A name']
 		$this->message->setTo( $this->mailData->getTo() );

  		// Give it a body
  		$this->message->setBody( $this->mailData->getBody(), 'text/html' );

  		// And optionally an alternative body
  		//$this->message->addPart('<h1><q>Here is the message itself</q></h1>', 'text/html');

  		// Optionally add any attachments
  		//$this->message->attach(Swift_Attachment::fromPath('my-document.pdf'));
    }



    public function send()
    {    	
    	$this->mail->send( $this->message );
    }

}?>