<?php
namespace App\Domain\Site\Data;

final class NewsletterCreateData{

	private $idnewsletter = null;
	private $email = '';
	private $date = '';
	private $active;

	function __construct(){
		$this->email = 'padrao';
		$this->date = '';
		$this->active = 1;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getId()
	{
		return $this->idnewsletter;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function setEmail($email):void
	{
		$this->email = $email;
	}

	public function setActive($active):void
	{
		$this->active = $active;
	}

	public function setId(int $id):void
	{
		$this->idnewsletter = $id;
	}
}