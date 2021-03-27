<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Middleware\MiddlewareLogin;

return function (App $app) {

	$app->get('/', \App\Action\HomeAction::class);	
	
	$app->group('/site', function (RouteCollectorProxy $group) {
		$group->get('/home', \App\Action\HomeAction::class.':home');
		$group->get('/produtos', \App\Action\HomeAction::class.':produtos');
		$group->get('/sobre',\App\Action\HomeAction::class.':sobre');
		$group->get('/contato', \App\Action\HomeAction::class.':contato');
		$group->post('/contato', \App\Action\MailAction::class.':contato');

		$group->get('/produtos/sanq-mol-ls', \App\Action\HomeAction::class.':sanqmolls');
	});
	
	$app->get('/login', \App\Action\Validation\LoginAction::class);	

	
	/*
	*	GRUPO DE ROTAS PARA USUARIOS
	*/
	$app->group('/user', function (RouteCollectorProxy $group) {
		$group->get('/show', \App\Action\User\UserSelectAction::class.':selectAllUsers');
		$group->get('/new', \App\Action\User\UserCreateAction::class);
		$group->post('/new',\App\Action\User\UserCreateAction::class.':newUser');
		$group->get('/update', \App\Action\User\UserUpdateAction::class);
	});

	$app->get('/password',\App\Action\Test\PasswordAction::class );

	/*
	// rota para envio do formulario de contato por email
	*/    
	$app->get('/mail', \App\Action\Test\TestConectionAction::class);
	



	/* ---------------------ROTAS PARA TESTES--------------------------*/
	$app->get('/testedeconexao', \App\Action\Test\TestConectionAction::class);
	$app->get('/teste', \App\Action\Test\TestSlim::class);
	$app->get('/testeuser', \App\Action\Test\TestUser::class);

	$app->get('/testes/contador', \App\Action\Test\TestConectionAction::class);

	$app->group('/testes', function (RouteCollectorProxy $group) {
		$group->get('/billing', \App\Action\HomeAction::class);
		$group->get('/users', \App\Action\User\UserCreateAction::class);		
	})->add( new MiddlewareLogin() );
};