<?php

namespace Project\Auth\models;


use PDO;
use Project\Classes\DB\DB;
use Project\Classes\Helper;

/**
 * Class AuthModel
 * @package Project\Auth\models
 */
class AuthModel {

  const USER_TYPES = [
      'id' => PDO::PARAM_INT,
      'username' => PDO::PARAM_STR,
      'password' => PDO::PARAM_STR,
      'role_id' => PDO::PARAM_INT,
      'email' => PDO::PARAM_STR
  ];
  const TOKEN_TYPES = [
      'id' => PDO::PARAM_INT,
      'user_id' => PDO::PARAM_INT,
      'token' => PDO::PARAM_STR
  ];

  protected $db;

  public function __construct() {
    $this->db = DB::getDB();
    Helper::startSession();
  }

  public static function getUser($key = 'username') {
    Helper::startSession();
    return isset($_SESSION['user']) ? $_SESSION['user'][$key] : false;
  }
}