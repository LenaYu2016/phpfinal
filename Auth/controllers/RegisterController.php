<?php

namespace Project\Auth\controllers;


use Project\Auth\models\RegisterModel;
use Project\Classes\Helper;
use Project\Validation\Validator;

class RegisterController extends AuthController{

  public function __construct() {
    parent::__construct();
    $this->model = new RegisterModel();
  }

  // GET /Auth/Register
  public function registerPage() {
    return $this->view->render('/Auth/Views/index', 'Register');
  }

  // POST Register/user
  // Check availability of an username
  public function checkAvailability() {
    $name = Helper::getParam('name');
    $value = Helper::getParam('value');
    return $this->view->json(['available' => $this->model->checkAvailability($name, $value)]);
  }

  // POST /Auth/Register
  public function registerUser() {
    // Validate user inputs
    $v = new Validator($_POST);
    $v->validate('username', ['notEmpty']);
    $v->email()->validate('email', ['notEmpty', 'EmailValidator']);

    if ($v->isValid()) {
      $result = $this->model->newUser(Helper::getParam('username'), Helper::getParam('password'), Helper::getParam('email'));
      return $this->view->json($this->resultArray($result['success'], $result['error']));
    } else {
      return $this->view->json($this->resultArray(false, $v->getErrors()));
    }
  }
}