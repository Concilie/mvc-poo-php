<?php

use Router\Router;
require './../vendor/autoload.php';

$router = new Router();

$router->register('/', ['Controllers\HomeController', 'index']);

$router->register('/users', ['Controllers\UserController', 'index']);

//Faire un run ou un resolve pour que l'url 
//sur laquel je suis fasse la bonne action a faire
try {
    echo $router->resolve($_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    echo $e->getMessage();
}
