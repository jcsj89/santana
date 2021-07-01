<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

use Slim\Views\Twig;

use App\Domain\Site\Data\SellerCreateData;
use App\Domain\Site\Repository\SellerRepository;
use PDO;

class TestUser
{
	private $view; 
	private $repo;


	public function __construct( Twig $twig, SellerRepository $repo )
	{
		$this->view = $twig; 		
		$this->repo = $repo;

	}

	public function __invoke(ServerRequest $request, Response $response): Response
	{
		
		$seller = new SellerCreateData();
		$seller->name = 'jose carlos';
		$seller->tel='997257501';
		$seller->msg='oi';
		$seller->idcadRevendedor=1;

		$sellers = $this->repo->insert($seller);
		$all = $this->repo->selectAllSeller();
		$byid = $this->repo->selectById(1);
		//continuar aqui
		$payload = json_encode($all);

		$response->getBody()->write($payload);
		
		return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(201);

	}	

}