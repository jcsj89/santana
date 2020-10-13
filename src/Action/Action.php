<?php
namespace App\Action;
use Psr\Container\ContainerInterface;

abstract class Action
{
    protected $container;

    public function __construct(ContainerInterface $ci) {
        $this->container = $ci;
    }    
    
}