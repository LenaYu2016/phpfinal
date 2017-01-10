<?php
/**
 * Created by PhpStorm.
 * User: yi
 * Date: 15/04/16
 * Time: 4:14 PM
 */

include '../../autoloader.php';
use Project\Classes\Request;
use Project\Classes\Router\Nav;
// single quote
$controller = '\Project\Examples\admin\AdminController';

Nav::group('/admin as admin', function() use($controller) {
  Nav::get('/home as Home', "$controller@home"); // GET /admin/home
  Nav::get('/test/:id as Home', function($id, Request $request) { var_dump($request); echo 'test' . $id;}); // GET /admin/home
  Nav::get('/news as Admin news', "$controller@news");// GET /admin/new
  Nav::post('/home as Admin news', "$controller@home");// GET /admin/new
});

Nav::start();

