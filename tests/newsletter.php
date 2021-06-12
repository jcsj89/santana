<?php
namespace App\Test;

class newsletter{

	public function salvaArquivo()
	{
		$data = array(
			"nome" => "Yuri",
			"idade" => 28
		);

		$arquivo = 'data.json';
		$json = json_encode($data);
		$file = fopen('/json/' . $arquivo,'w');
		fwrite($file, $json);
		fclose($file);
	}
	
}
