<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

use App\Domain\Mail\Data\MailCreateData;
use App\Domain\Mail\Service\SendMail;

final class HomeAction 
{
	
	private $view; 
  private $sendMail; 

  public function __construct(Twig $twig, SendMail $sendMail)
  {
    $this->view = $twig;  
    $this->sendMail = $sendMail;  
  }

  public function __invoke( ServerRequestInterface $request, ResponseInterface $response ): ResponseInterface
  {               
    return $response->withHeader('Location', '/site/home')->withStatus(302);     
  }

  public function home(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface 
  {    
    return $this->view->render($response,'home.twig');
  }

  //Action page contato
  public function contato(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface 
  {    
    return $this->view->render($response,'contato.twig');
  }

  //Action page sobre
  public function sobre(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
  {    
    return $this->view->render($response,'sobre.twig');
  }
  
  public function mailer( ServerRequestInterface $request, ResponseInterface $response): ResponseInterface 
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
    
    return $this->view->render($response,'contato.twig',$viewData);   

  }

}//class