<?php
namespace App\Domain\Site\Data;

final class ResearchCreateData{

	public $idsugestao;
	public $nossocliente;
	public $recomendaproduto;
	public $sugestao;
	

	function __construct(){
		$this->idsugestao = null;		
		$this->nossocliente = 0;
		$this->recomendaproduto = 0;
		$this->sugestao = '';		
	}

}