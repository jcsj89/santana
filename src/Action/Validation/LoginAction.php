<?php
namespace App\Action\Validation;

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


  public function __invoke(ServerRequest $request, Response $response, $args = ['']): Response
  {               
    return $this->view->render(
      $response,
      '/admin/login/login.twig'            
    );
  }    

}//class