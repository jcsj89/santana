<?php

namespace App\Domain\JSON\Data;

/**
 * Data : 13/06/2021
 * 
 * Classe de dados para armazenar os email da
 * newsletter do site, criando uma lista de emails
 */
class NewsLetterJsonData
{
	private $array;
	private $maxLenght=50;

	function __construct()
	{
		$array = array();
	}

	/*
	* Método inclui item no array
	* validando se é um email
	*/
	public function setItem($item)
	{
		if (is_string($item) && !empty($item) && strlen($maxLenght)<$this->maxLenght && filter_var($item, FILTER_VALIDATE_EMAIL) ) {
			$this->array[] = $item;
			return TRUE;
		}else{
			return FALSE;
		}		
	}

	//retorna o array de emails
	public function getItens()
	{
		if (is_array($this->array) ) {
			return $this->array;
		}		
	}

	public function setArray($array)
	{
		if (is_array($array) ) {
			$this->array = $array;

			return TRUE;
		}else{
			return FALSE;
		}	
	}
}