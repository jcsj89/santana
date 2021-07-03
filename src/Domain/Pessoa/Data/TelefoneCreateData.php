<?php
namespace App\Domain\Pessoa\Data;
/**
 * Description of TelefoneCreateData
 *
 * @author Junior
 */
final class TelefoneCreateData
{
	private $id;
	private $id_pessoa;
	private $telefone;

	function __construct()
	{
		$this->telefone='';
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId_pessoa()
	{
		return $this->id_pessoa;
	}

	public function setId_pessoa($id_pessoa)
	{
		$this->id_pessoa = $id_pessoa;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setTelefone($telefone = '')
	{
		$this->telefone = $telefone;
	}
}