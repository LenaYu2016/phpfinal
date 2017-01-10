<?php

include '../../autoloader.php';
include "AdminController.php";

use Project\Classes\Router\Nav;
// single quote


Nav::group('/admin as admin', function() {
  $controller = 'AdminController';

  Nav::get('/home as Home', "$controller@home");
  Nav::get('/movie as Movies', "$controller@movies");
  Nav::get('/contact as Contacts ', "$controller@contact");
  Nav::get('/rating as Ratings ', "$controller@rating");
  Nav::get('/menu as Menu Editor', "$controller@menu");
  Nav::get('/page as Custom Page', "$controller@customPage");
  Nav::get('/faq as FAQ Admin', "$controller@FAQAdmin");
  Nav::post('/faq', "$controller@FAQAdmin");
});

//add movie

Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::post('/addMovie', "$controller@addMovie");
});
//For direct URL access
Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::get('/addMovie', "$controller@addMovie");
});

//Edit movie

Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::post('/editMovie', "$controller@editMovie");
});
//For direct URL access
Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::get('/editMovie', "$controller@editMovie");
});

//edit contact
Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::post('/editContact', "$controller@editContact");
});

Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::get('/editContact', "$controller@editContact");
});

//Modified contactpage
Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::post('/editedContact', "$controller@editedContact");
});

Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::get('/editedContact', "$controller@editedContact");
});

//edit Rating system
Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::post('/editRating', "$controller@editRating");
});

Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::get('/editRating', "$controller@editRating");
});

//Modified Rating system
Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::post('/editedRating', "$controller@editedRating");
});

Nav::group('/admin', function() {
  $controller = 'AdminController';
  Nav::get('/editedRating', "$controller@editedRating");
});

Nav::start();
