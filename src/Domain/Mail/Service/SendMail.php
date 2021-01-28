<?php 
namespace App\Domain\Mail\Service;

use App\Domain\Mail\Service\SwiftMailerFacade;
use App\Factory\LoggerFactory; 
use Psr\Log\LoggerInterface;
use Exception; 

class SendMail
{
	private $mailer;
	/** * @var LoggerInterface */
    private $logger;
    private $data;
    private $log;

	function __construct( LoggerFactory $logger )
	{		
		$this->logger = $logger->addFileHandler('sendmail.log')->createInstance('sendmail');
				
	}

	public function setData($data)
	{

		$this->data = $data;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setLog($log='email enviado')
	{
		$this->log = $log;
	}

	public function getLog()
	{
		return $this->log;
	}

	public function send()
	{
		try {
			$mailer = new SwiftMailerFacade( $this->getData() );
			$mailer->send();
			$this->logger->info( $this->getLog() );
		} catch (Exception $e) {
			// Log error message
            $this->logger->error($exception->getMessage());
            
            throw $exception;
		}
		
	}
}