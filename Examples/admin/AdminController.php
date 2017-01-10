<?php
/**
 * Created by PhpStorm.
 * User: yi
 * Date: 15/04/16
 * Time: 4:21 PM
 */

namespace Project\Examples\admin;


use Project\Auth\models\AuthModel;
use Project\Classes\Request;
use Project\Classes\View;

class AdminController {

  public function __construct() {
    $this->model = new AuthModel();
    $this->view = new View([
        'css' => [
            '/Assets/css/bootstrap.min.css',
            '/Assets/css/admin.css',

        ],
        'js' => [
            '/Assets/js/jquery.min.js',
            '/Assets/js/bootstrap.min.js',
            '/jspm_packages/system.js',
            '/config.js'
        ],
        'header' => '/Admin_Login/admin_header.php',
        'footer' => '/Auth/Views/footer.php'
    ]);
  }

  public function home(Request $request) {
    var_dump($request);
    $this->view->render('/Examples/admin/test', 'Admin Home');
  }

  public function news() {
    $this->view->render('/index', 'Admin news');
  }





}