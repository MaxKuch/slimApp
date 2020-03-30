<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Middlewares\AuthMiddleware;
use Middlewares\CheckMiddleware;
use Middlewares\AdminCheckMiddleware;
use Middlewares\ControlMiddleware;
// $app->get('/auth', function (Request $request, Response $response, array $args)
// {
//     $errors = $request->getQueryParams();
//     return $this->view->render('auth.html', array('errors' => $errors));
// })->setName('auth')->add(new ControlMiddleware()); 
$app->get('/', "PageController:renderPage")->setName('auth')->add(new ControlMiddleware());

$app->post('/auth/registration', "AuthController:registration");

$app->post('/auth/login', "AuthController:login");

$app->get('/auth/logout', "AuthController:logout");

$app->get('/admin', "AdminController:login");

$app->get('/admin/users-accounts', "AdminController:usersAccounts");

$app->get('/admin/sessions', "AdminController:sessions");