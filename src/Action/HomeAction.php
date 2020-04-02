<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use App\Action\Action;
use Slim\Views\Twig;

use App\Domain\Mail\Data\MailCreateData;
use App\Domain\Mail\Service\SendMail;

final class HomeAction extends Action
{
	
	private $view; 
  private $sendMail; 

  public function __construct(Twig $twig, SendMail $sendMail)
  {
    $this->view = $twig;  
    $this->sendMail = $sendMail;  
  }

  public function __invoke(ServerRequest $request, Response $response, $args = ['']): Response
  {               
    return $this->view->render(
      $response,
      'home.twig'            
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

  
  public function mailer(ServerRequest $request, Response $response): Response 
  {
    $parsedBody = $request->getParsedBody();
    $viewData = [];
    if ( !empty($parsedBody) && !empty($parsedBody['email']) && !empty($parsedBody['msg'])) 
    {
      
      $mensagem = 'Nome: ' . $parsedBody['nome'] . '<br>' . 'Email: '. $parsedBody['email'] . '<br>' .
      'Telefone: ' . $parsedBody['telefone'] . '<br>' . 'Mensagem : ' . $parsedBody['msg'];

      $email = new MailCreateData();
      $email->setBody( $mensagem );
      $email->setAltBody( $mensagem );    

      $this->sendMail->sendMail($email);
      
      $viewData = [
      'send' => true           
      ];

    }
    return $this->view->render(
      $response,
      'home.twig',
      $viewData
    );

    //return $response->withRedirect('/');    
    //return $response->withJson($viewData)->withStatus(201);
    //return $this->container->app->response->withRedirect( $this->router->pathFor('/', [], $viewData   ));

  }

}//class