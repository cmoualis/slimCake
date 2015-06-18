<?php
require 'vendor/autoload.php';
$app = new Slim\Slim(array(
    'templates.path' => 'App/Views'
));

//Router
$router = new Core\Router($app);
require_once 'App/routes.php';


$app->run();