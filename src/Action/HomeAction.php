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
    return $response->withRedirect('/site/home');    
  }

  public function home(ServerRequest $request, Response $response): Response 
  {    
    return $this->view->render(
      $response,
      'home.twig'      
    );
  }

  //Action page contato
  public function contato(ServerRequest $request, Response $response): Response 
  {    
    return $this->view->render(
      $response,
      'contato.twig'      
    );
  }

  //Action page sobre
  public function sobre(ServerRequest $request, Response $response): Response 
  {    
    return $this->view->render(
      $response,
      'sobre.twig'      
    );
  }
  
  public function mailer(ServerRequest $request, Response $response): Response 
  {
    $parsedBody = $request->getParsedBody();
    $viewData = [];
    
    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Ler-OcUAAAAAJKsd0wqEQJknKJ_Ge1i_lQLgio1';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
      if ( !empty($parsedBody) && !empty( $parsedBody['msg'] ) ) 
      {
        
        $mensagem = 'Nome: ' . $parsedBody['nome'] . '<br>' . 'Email: '. $parsedBody['email'] . '<br>' .
        'Telefone: ' . $parsedBody['telefone'] . '<br>' . 'Mensagem : ' . $parsedBody['msg'];

        $email = new MailCreateData();
        $email->setBody( $mensagem );
        $email->setAltBody( $mensagem );    

        $this->sendMail->sendMail($email);

        $viewData['send'] = true;   

      }
    } else {
        $viewData['send'] = false;
    }
    
    return $this->view->render(
      $response,
      'contato.twig',
      $viewData
    );

    //return $response->withRedirect('/');    
    //return $response->withJson($viewData)->withStatus(201);
    //return $this->container->app->response->withRedirect( $this->router->pathFor('/', [], $viewData   ));

  }

}//class