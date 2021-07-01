<?php
namespace App\Domain\Site\Data;

final class SellerCreateData{

	public $idcadRevendedor;
	public $revendedor;
	public $name;
	public $email;
	public $telefone;
	public $cidade;
	public $cep;
	public $estado;
	public $mensagem;
	public $trabArea;

	function __construct(){
		$this->idcadRevendedor = null;
		$this->revendedor = 1; //1 for revendedor - 0 for representante
		$this->name='';
		$this->email = '';
		$this->telefone = '';
		$this->cidade = '';
		$this->cep = '';
		$this->estado = '';
		$this->mensagem = '';
		$this->trabArea = 1; //1 for yes - 0 for no
	}

}