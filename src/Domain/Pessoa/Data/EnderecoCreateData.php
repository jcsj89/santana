<?php
namespace App\Domain\Pessoa\Data;
/**
 * Description of EnderecoCreateData
 *
 * @author Junior
 */
final class EnderecoCreateData
{
	private $id;
	private $endereco;
	private $numero;
	private $cidade;
	private $estado;
	private $bairro;
	private $cep;
	private $id_pessoa;
	function __construct()
	{
		$this->endereco='';
		$this->numero='';
		$this->cidade='';
		$this->estado='';
		$this->bairro='';
		$this->cep='';
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

	public function getEndereco()
	{
		return $this->endereco;
	}

	public function setEndereco($endereco = '')
	{
		$this->endereco = $endereco;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($numero = '')
	{
		$this->numero = $numero;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function setCidade($cidade = '')
	{
		$this->cidade = $cidade;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setEstado($estado = '')
	{
		$this->estado = $estado;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function setBairro($bairro = '')
	{
		$this->bairro = $bairro;
	}

	public function getCep()
	{
		return $this->cep;
	}

	public function setCep($cep = '')
	{
		$this->cep = $cep;
	}
}