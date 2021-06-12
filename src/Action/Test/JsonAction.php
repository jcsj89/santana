<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

use App\Test\newsletter;

final class JsonAction 
{
	
	private $view;   

	public function __construct( Twig $twig )
	{
		$this->view = $twig;    
	}

	public function __invoke( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
	{               
		return $this->view->render( $response,'prod/sidebar.prod.twig' );   
	}

	public function teste(ServerRequestInterface $request, ResponseInterface $response ):ResponseInterface
	{

	$news = new newsletter;
	$news->salvaArquivo();

    # code...
		$data = array('jcsj2010@gmail.com', 'jcsj89@gmail.com');
		$payload = json_encode($data);

		$response->getBody()->write($payload);
		return $response
		->withHeader('Content-Type', 'application/json');		
	}

}