<?php
namespace App\Domain\Site\Service;

use App\Domain\Site\Repository\NewsletterRepository;
use App\Domain\Site\Data\NewsletterCreateData;

final class NewsletterServices
{
	private $repository;

	function __construct(NewsletterRepository $newsletterRepository)
	{
		$this->repository = $newsletterRepository;
	}

	//save or update email newsletter
	public function save(NewsletterCreateData $news)
	{
		//if email already exists return a message
		if ( $this->repository->selectNewsletterByEmail($news->getEmail()) !== false ){
			return 'cadastrado';
		}

		//insert or update email in newsletter
		//if ok return true
		if ( !empty($news->getEmail()) || !empty($news->getId()) ) {			
			return $this->repository->insertNewsletter($news);			
		}
		
		return false;
	}

	//delete email in newsletter
	public function delete(int $id)
	{
		
		if ( !empty($id)) {
			return $this->repository->delete($id);
		}
		
		return false;
	}

	//fetch by id
	public function selectById(int $id)
	{
		
		if ( !empty($id)) {
			return $this->repository->selectNewsletter($id);
		}
		
		return false;
	}

	//fetch by email
	public function selectByEmail($email)
	{
		
		if ( !empty($email)) {
			return $this->repository->selectNewsletterByEmail($email);
		}
		
		return false;
	}

	//fetch all
	public function selectAll()
	{		
		return $this->repository->selectAllNewsletter();	
	}

}
