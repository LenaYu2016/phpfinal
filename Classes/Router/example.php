<?php
use Project\Classes\Router\Nav;

include "Nav.php";
include '../Helper.php';
include 'Route.php';


// A function makes example cleaner.
function display($word) {
  return function () use ($word) { echo $word; };
}

Nav::group('/Classes/Router as Router Example', function () {
  Nav::get('/ as Home', display('Home'));
  Nav::get('/login as Login', display('Login'));
  Nav::get('/register as Register', display('Register'));

  Nav::group('/Classes/Router/register as Register', function () {
    Nav::get('/1 as sub menu 1', display('register sub page 1'));

    Nav::group('/Classes/Router/register/1 as sub menu 1', function () {
      Nav::get('/1 as R11', display('R11'));
    });
    Nav::get('/2 as sub menu 2', display('register sub page 2'));
  });
  Nav::get('/logout as Logout', display('Logout'));

  Nav::post('/login', display('Login post'));
  Nav::post('/register', display('Register Post'));
});

Nav::start();
var_dump(json_encode(Nav::menu()));
Nav::drawMenu('Router Example');


