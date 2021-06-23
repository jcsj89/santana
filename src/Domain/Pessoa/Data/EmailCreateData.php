<?php
namespace App\Domain\Pessoa\Data;
/**
 * Description of EmailCreateData
 *
 * @author Junior
 */
final class EmailCreateData
{
	private $id;
	private $id_pessoa;
	private $email='';

	function __construct()
	{
		$this->email='';
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

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email = '')
	{
		$this->email = $email;
	}
}