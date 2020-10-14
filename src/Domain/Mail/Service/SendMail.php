<?php 
namespace App\Domain\Mail\Service;

use App\Domain\Mail\Data\MailCreateData;
use App\Domain\Mail\Repository\MailCreatorRepository;
/**
 * 
 */
class SendMail
{
	private $repository;
	function __construct( MailCreatorRepository $repository )
	{
		$this->repository = $repository;
	}

	public function SendMail( MailCreateData $data )
	{
		return $this->repository->sendMail($data);
	}
}
 ?>