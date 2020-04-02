<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use App\Action\Action;
use Slim\Views\Twig;

use Slim\Routing\RouteContext;


final class TestSlim extends Action
{
	private $view; 


	public function __construct(Twig $twig)
	{
		$this->view = $twig;  

	}

	public function __invoke(ServerRequest $request, Response $response): Response
	{   	
	
		$routeContext = RouteContext::fromRequest($request);
    	$basePath = $routeContext->getBasePath();
    	$request = $request->withAttribute('session', 'sessao2');

    	$route = \Slim\Routing\RouteContext::fromRequest($request)->getRoute();
    	$routeArguments = \Slim\Routing\RouteContext::fromRequest($request)->getRoute()->getArguments();
    	$routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
    	$basePath = \Slim\Routing\RouteContext::fromRequest($request)->getBasePath();

    	$session = $request->getAttribute('session'); // get the session from the request
    	$session2 = $request->getAttributes();

    	//teste de sessao
    	$_SESSION['teste'] = 'estou na sessao';
		$array2 = [
			'uri' =>  $request->getUri(),
			'scheme' =>  $request->getUri()->getScheme(),
			'aut' =>  $request->getUri()->getAuthority(),			
			'path' =>  $request->getUri()->getPath(),
			'parsedbody' => $request->getParsedBody(),
			'body' => $request->getBody()->getContents(),
			'lengt' => $request->getHeaderLine('Content-Length'),
			//'params' => $request->getServerParams(),
			'basepath' => $basePath,
			'atributo'=> $session,
			'atributos'=> $session2,
			'sessionId' => session_id(),
			'sessionName'=> session_name()
			
		];

		//$response->getBody()->write(var_dump($array2));
		return $response->withJson($array2)->withStatus(201);
		//return $this->view->render($response,'app.twig',$array2);
	}

}