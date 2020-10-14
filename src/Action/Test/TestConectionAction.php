<?php

namespace App\Action\Test;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;
use App\Test\ConectionTest;

final class TestConectionAction
{
    public function __invoke(ServerRequest $request, Response $response): Response
    {
    	$conn = new ConectionTest();
    	$message = $conn->testaConexao();

        $response->getBody()->write($message);        
        return $response;
    }

}