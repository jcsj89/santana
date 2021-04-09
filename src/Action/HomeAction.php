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

  // PAGINA SANQ MOL LS
  public function sanqmolls( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/sanq.mol.ls.twig' );  
  }  

  // PAGINA SANQ MOL 
  public function sanqmol( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/sanq.mol.twig' );  
  }  

  // PAGINA SANQ CHASSIS 110
  public function sanqchassis( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/sanq.chassis.110.twig' );  
  }  

  // PAGINA SAMIX LS
  public function samixls( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/samix.ls.twig' );  
  }  

  // PAGINA SAMIX 220
  public function samix220( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/samix.220.twig' );  
  }  

  // PAGINA ATIVADO 220
  public function ativado220( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/ativado.220.twig' );  
  }  

  // PAGINA ATIVADO 110
  public function ativado110( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/ativado.110.twig' );  
  }  

  // PAGINA ATIVADO LS
  public function ativadols( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/ativado.140.twig' );  
  }  

  // PAGINA PNEU BRILL
  public function pneubrill( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/pneu.brill.twig' );  
  }  

  // PAGINA MULT MAX
  public function multmax( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/mult.max.twig' );  
  }  

  // PAGINA SILICONE GEL
  public function siliconegel( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {    
    return $this->view->render( $response,'prod/silicone.gel.twig' );  
  }  
}//class