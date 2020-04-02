<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use App\Action\Action;
use Slim\Views\Twig;

final class LoginAction extends Action
{
	
	private $view;   

  public function __construct(Twig $twig)
  {
    $this->view = $twig;      
  }

  public function __invoke(ServerRequest $request, Response $response): Response
  {               
    return $this->view->render(
      $response,
      '/admin/login/login.twig'            
    );
  }

  public function action(ServerRequest $request, Response $response): Response 
  {
    $viewData = [
      'now' => date('Y-m-d H:i:s'),      
      'dir' => __DIR__       
    ];
    return $this->view->render(
      $response,
      'home.twig',
      $viewData
    );
  }

}//class