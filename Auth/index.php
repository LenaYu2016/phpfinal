<?php

namespace Project\Auth;

use Project\Classes\Router\Nav;

include '../autoloader.php';



Nav::group('/Auth as Auth', function () {
  $login = 'Project\Auth\controllers\LoginController';
  Nav::get('/ as Home', "$login@home");
  Nav::get('/login as Login', "$login@loginPage");
  Nav::get('/admin', "$login@adminLoginPage");
  Nav::get('/logout as Logout', "$login@logout");
  Nav::get('/getLogin as Logout', "$login@getLogin");

  Nav::post('/login', "$login@processLogin");
  Nav::post('/admin', "$login@adminLogin");

});

Nav::group('/Auth as register', function() {
  $register = 'Project\Auth\controllers\RegisterController';
  Nav::get('/register as Register', "$register@registerPage");
  Nav::post('/register', "$register@registerUser");
  Nav::post('/register/user', "$register@checkAvailability");

});

// Oauth
Nav::group('/Auth as OAuth', function() {
  $oauth = 'Project\Auth\controllers\OAuthController';

  Nav::get('/login/github', "$oauth@github");
});

Nav::start();

?>



