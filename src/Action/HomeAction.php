<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class HomeAction 
{
	
	private $view;   

  public function __construct( Twig $twig )
  {
    $this->view = $twig;    
  }

  public function __invoke( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {               
    return $response->withHeader('Location', '/site/home')->withStatus(302);    
  }

  // PAGINA HOME
  public function home( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface 
  {    
    return $this->view->render( $response,'home.twig' );
  }

  // PAGINA CONTATO
  public function contato( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface 
  {    
    return $this->view->render( $response,'contato.twig' );
  }

  // PAGINA SOBRE
  public function sobre( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'sobre.twig' );  
  }  

  // PAGINA PRODUTOS
  public function produtos( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'produtos.twig' );  
  }  

}//class