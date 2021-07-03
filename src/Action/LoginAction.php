<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Action\Action;
use Slim\Views\Twig;

final class LoginAction
{
	
	private $view;   

  public function __construct(Twig $twig)
  {
    $this->view = $twig;      
  }

  public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
  {               
    return $this->view->render($response,'/admin/login/login.twig');
  }

  public function action(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
  {
    $viewData = [
      'now' => date('Y-m-d H:i:s'),      
      'dir' => __DIR__       
    ];
    return $this->view->render($response,'home.twig',$viewData);
  }

}//class