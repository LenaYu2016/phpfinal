<?php

namespace Project\Auth\models;


class OAuthModel extends RegisterModel{

  // for every new oauth user,
  // register if there is no existing user,
  // login as existing user if email match

  public function logIn($type, $username, $email) {
    $user = $this->findOAuthUser($email);
    if(!$user) {
      $this->register($type, $username, $email);
      $user = $this->findOAuthUser($email);
    }
    $login = new LoginModel();
    $login->addUserToSession($user);
  }

  private function findOAuthUser($email) {
    $stmt = $this->db->prepare("
      SELECT * FROM users WHERE email = :email;
    ");
    $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $user ? $user : false;
  }

  private function register($prefix, $username, $email) {
    $password = $this->randomPassword(32);
    $this->newUser($prefix . '_' . $username, $password, $email);
  }
}