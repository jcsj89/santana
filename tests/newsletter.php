<?php
namespace App\Test;

class newsletter{

	public function salvaArquivo()
	{
		
		$data = array(
			"nome" => "Jose",
			"idade" => 31
		);

		$arquivo = 'data.json';
		$json = json_encode($data);
		$file = fopen('json/' . $arquivo,'w');
		fwrite($file, $json);
		fclose($file);
	
		$readJSON = file_get_contents('json/data.json');

		$array = json_decode($readJSON, TRUE);
		$array[] = 'zesantanna2';
		
	}	
}
