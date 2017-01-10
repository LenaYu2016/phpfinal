<?php

namespace Project\Auth\models;


use PDO;
use Project\Classes\DB\DB;

class RegisterModel extends AuthModel {

  // New user
  public function newUser($username, $password, $email) {

    $insertResult = DB::insert('users', [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'email' => $email
    ], self::USER_TYPES);
    
    $queryResult['success'] = is_bool($insertResult) ? true : false;
    $queryResult['error'] = is_string($insertResult) ? $insertResult : '';

    return $queryResult;

  }

  public function checkAvailability($name, $value) {
    $col = ['username'=>'username', 'password' => 'password', 'email' => 'email'];
    $sql = "SELECT * FROM users WHERE $col[$name]";
    $stmt = $this->db->prepare($sql . ' = :colValue');
    $stmt->bindParam(':colValue', $value, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch() ? false : true;
  }

  // Generates a random password
  // Source: https://gist.github.com/zyphlar/7217f566fc83a9633959
  public function randomPassword($length) {
    $bytes = openssl_random_pseudo_bytes($length + 1, $strong);
    if (false !== $bytes && true === $strong) {
      return substr(preg_replace("/[^a-zA-Z0-9]/", "", base64_encode($bytes)),0,$length);
    }
    else {
      throw new \Exception("Unable to generate secure token from OpenSSL.");
    }

  }
}