<?php
namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class SideBarAction 
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
    # code...
    return $this->view->render( $response,'prod/prod.teste.twig' );   
  }

}