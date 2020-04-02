<?php
namespace App\Action;
use Psr\Container\ContainerInterface;

abstract class Action
{
    protected $container;

    public function __construct(ContainerInterface $ci) {
        $this->container = $ci;
    }
    
    //abstract public function __invoke(Request $request, Response $response, $args = []);
}