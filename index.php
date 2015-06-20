<?php
require 'vendor/autoload.php';
$app = new Slim\Slim(array(
    'templates.path' => 'App/Views',
    'view' => new Core\ChuchuView(),
    'layout' => 'default.php'
));

// Model
$app->db = function(){
    $config =include "App/config.php";
    $driver = key($config['db']);
    $pdo =new \PDO($driver . ':host=' . $config['db'][$driver]['host'] . ';dbname=' . $config['db'][$driver]['dbname'], $config['db'][$driver]['login'], $config['db'][$driver]['password']);
    return  new NotORM($pdo);    
};

//Router
$router = new Core\Router($app);
require_once 'App/routes.php';



$app->run();