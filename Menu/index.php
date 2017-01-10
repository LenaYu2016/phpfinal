<?php

include '../autoloader.php';
$controller = 'Project\Menu\MenuController';
$router = new \Project\Classes\Router\Router();

$router->get('/page/:id', "$controller@GetPage");

$router->startRouting();