<?php

namespace Project\Auth\controllers;

use Project\Auth\models\LoginModel;
use Project\Classes\Helper;

class LoginController extends AuthController{

  public function __construct() {
    parent::__construct();
    $this->model = new LoginModel();
  }

  // GET /Auth/login
  public function home() {
    return $this->view->render('/Auth/Views/index', 'auth');
  }

  // Login page GET
  public function loginPage() {
    if ($this->model->logInViaCookie()) {
      return ('logged in as ' . $this->model->getUser());
    } else {
      return $this->view->render('/Auth/Views/index', 'Login Page');
    }
  }

  // Login page POST
  public function processLogin() {
    $output = ['success' => false, 'error' => []];
    // try login user
    $loginResult = $this->model->logIn(Helper::getParam('username'), Helper::getParam('password'));
    if ($loginResult) {
      $output['success'] = true;
    } else {
      $output['error'][] = 'username or password is not correct';
    }
    return $this->view->json($output);
  }

  public function adminLoginPage() {
    return $this->view->render('/Auth/Views/admin', 'admin login Page');
  }

  // Admin POST
  public function adminLogin() {
    $output = ['success' => false, 'error' => []];
    $loginResult = $this->model->adminLogin(Helper::getParam('username'), Helper::getParam('password'));
    if ($loginResult) {
      $output['success'] = true;
    } else {
      $output['error'][] = 'username or password is not correct';
    }
    return $this->view->json($output);
  }

  // Logout GET
  public function logout() {
    $this->model->logOut();
    return $this->view->json($this->resultArray($this->model->getUser() == false, 'You have not logged in yet'));
  }


  public function getLogin() {
    $this->model->logInViaCookie();
    $username = $this->model->getUser();
    if ($username) return $this->view->json(['success' => true, 'username' => $username]);
    if (!$username) return $this->view->json($this->resultArray(false, ''));
  }
}