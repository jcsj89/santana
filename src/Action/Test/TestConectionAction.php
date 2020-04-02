<?php

namespace App\Action\Test;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
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