<?php

include '../autoloader.php';

use Project\Classes\Router\Nav;




Nav::group('/Api', function() {
  $menuController = 'Project\Api\MenuController';
  Nav::get('/menu', "$menuController@MenuAll");
  Nav::get('/menu/:name', "$menuController@Menu");
  Nav::post('/menu', "$menuController@SaveMenu");

  $pageController = 'Project\Api\PageController';
  Nav::get('/page', "$pageController@GetAll");
  Nav::post('/page', "$pageController@AddPage");
  Nav::get('/page/:id', "$pageController@GetPage");
  Nav::put('/page/:id', "$pageController@UpdatePage");
  Nav::delete('/page/:id', "$pageController@DeletePage");


});

Nav::start();
