<?php

namespace Project\Auth\controllers;

use Project\Auth\models\GitHub;
use Project\Auth\models\OAuthModel;
use Project\Classes\Config\OAuthInfo;
use Project\Classes\Controller;
use Project\Classes\View;

class OAuthController extends Controller{

  public function __construct() {
    $this->view = new View();
    $this->model = new OAuthModel();
  }

  public function github() {
    $gitHub = new GitHub(OAuthInfo::GITHUB);

    if(!isset($_REQUEST['code'])) {
      $gitHub->connect();
    }

    $token = $gitHub->getToken();


    if($token) {
      $username = $gitHub->getUser();
      $email = $gitHub->getEmail();

      $this->model->logIn('github', $username, $email);
      header("Refresh: 3;url=http://php-project.yizhao.me/");
      echo "login success, redirecting back to home page";
    }

  }
}