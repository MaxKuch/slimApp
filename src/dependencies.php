<?php
$container = $app->getContainer();
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container['view'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($settings['template_path'], ['cache' => false]);
    return $view;
};

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container["PageController"] = function ($c) {
    return new \Controllers\PageController($c);
};

$container["AuthController"] = function ($c) {
    return new Controllers\AuthController($c);
};
$container["AdminController"] = function ($c) {
    return new \Controllers\AdminController($c);
};

