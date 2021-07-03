<?php
namespace App\Domain\Site\Service;

use App\Domain\Site\Repository\ResearchRepository;
use App\Domain\Site\Data\ResearchCreateData;

final class ResearchServices
{
	private $repository;

	function __construct(ResearchRepository $researchRepository)
	{
		$this->repository = $researchRepository;
	}

	//save or update reserach
	public function save(ResearchCreateData $research)
	{
		if ( !empty($research->sugestao) && strlen($research->sugestao) <= 2048 ) {			
			return $this->repository->insert($research);			
		}
		
		return false;
	}

	//delete email in Researchletter
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
			return $this->repository->selectAll();
		
	}	

}
