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
    $errors = $request->getQueryParams();
    return $this->view->render($response, 'auth.html', ['errors' => $errors]);
})->setName('auth')->add(new ControlMiddleware());



$app->post('/auth/registration', "AuthController:registration")->add(new ControlMiddleware());