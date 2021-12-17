<?php

require_once 'libs/Router.php';
require_once 'Controllers/ControllerApi.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comments/:ID', 'GET', 'ControllerApi', 'getComments');
$router->addRoute('comments/:ID/:PUNTAJE', 'GET', 'ControllerApi', 'getCommentsByRate');
$router->addRoute('comments/:ID', 'DELETE', 'ControllerApi', 'deleteComment');
$router->addRoute('comments', 'POST', 'ControllerApi', 'addComment');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
