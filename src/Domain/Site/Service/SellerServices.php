<?php
namespace App\Domain\Site\Service;

use App\Domain\Site\Repository\SellerRepository;
use App\Domain\Site\Data\SellerCreateData;

final class SellerServices
{
	private $repository;

	function __construct(SellerRepository $sellerRepository)
	{
		$this->repository = $sellerRepository;
	}

	//save or update dealer
	public function save(SellerCreateData $seller)
	{
		if ( !empty($seller->name) && !empty($seller->email) && !empty($seller->tel) && strlen($seller->msg) <= 3000 ) {			
			return $this->repository->insert($seller);			
		}
		
		return false;
	}

	//delete email in sellerletter
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
			return $this->repository->selectById($id);
		}
		
		return false;
	}	

	//fetch all
	public function selectAll()
	{			
			return $this->repository->selectAllSeller();
		
	}	

}
