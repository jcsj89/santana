<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

use Slim\Views\Twig;

use App\Domain\Site\Data\ResearchCreateData;
use App\Domain\Site\Service\SellerServices;
use App\Domain\Site\Service\ResearchServices;
use App\Domain\Site\Repository\ResearchRepository;

use PDO;

class TestUser
{
	private $view; 
	private $repo;

	public function __construct( Twig $twig, ResearchServices $repo)
	{
		$this->view = $twig; 		
		$this->repo = $repo;
	}

	public function __invoke(ServerRequest $request, Response $response): Response
	{	

		$seller = new ResearchCreateData();
		$seller->nossocliente = 1;
		$seller->recomendaproduto = 1;
		$seller->sugestao = 'alguma coisa';		
		//$seller->idsugestao=1;	
		
		//$sellers = $this->repo->save($seller);
		$all = $this->repo->selectAll();
		$byid = $this->repo->selectById(7);
		$this->repo->delete(5);
		
		$payload = json_encode($all);

		$response->getBody()->write($payload);
		
		return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(201);
	}	

}