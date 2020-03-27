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
$app->get('/', function (Request $request, Response $response, array $args)
{
    //$errors = $request->getQueryParams();
    return $this->view->render($response, 'auth.html', ['errors' => $errors]);
})->setName('auth')->add(new ControlMiddleware());



$app->post('/auth/registration', "AuthController:registration")->add(new ControlMiddleware());

$app->post('/auth/login', "AuthController:login")->add(new ControlMiddleware());

$app->get('/profile', "ProfileController:renderProfile")->add(new AuthMiddleware());

$app->get('/auth/logout', "AuthController:logout");

$app->get('/admin', "AdminController:login");

$app->get('/admin/users-accounts', "AdminController:usersAccounts");

$app->get('/admin/sessions', "AdminController:sessions");