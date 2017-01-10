<?php

namespace Project\Auth\models;

use \Project\Classes\DB\DB as DB;
use \PDO;

class LoginModel extends AuthModel{

  public function logIn($username, $password) {
    $user = $this->findUser($username, $password);
    if (!$user) return false;
    $this->addUserToSession($user);
    $this->updateCookie(self::getUser('id'));
    return true;
  }

  public function adminLogin($username, $password) {
    $user = $this->findUser($username, $password);
    if (!$user || $user['role_id'] !== '0') return false;
    $this->addUserToSession($user);
    $this->updateCookie(self::getUser('id'));
    return true;
  }

  public function logInViaCookie() {
    $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : null;
    if (!$cookie) return false;
    list($id, $token) = explode(';', $cookie);
    $tokenInfo = DB::select('tokens', ['id' => $id], self::USER_TYPES)[0];

    if ($tokenInfo['token'] && hash_equals($token, $tokenInfo['token'])) {
      $userId = $tokenInfo['user_id'];
      $user = DB::select('users', ['id' => $userId], self::USER_TYPES)[0];
      $this->addUserToSession($user);
      // Change token after it is used for logging in
      $this->updateCookie(self::getUser('id'));
      return true;
    }
    return false;
  }

  public function logOut() {
    $this->deleteCookie(self::getUser('id'));
    $_SESSION = [];
    session_destroy();
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

  // Protected
  public function addUserToSession($user) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username'],
        'roleId' => $user['role_id'],
        'email' => $user['email']
    ];
  }

  // Private functions

  // Encrypt a random number as cookie, save it to database.
  // After user has logged in with cookie, change it to another random number
  private function updateCookie($userId) {
    $id = hash('sha256', mt_rand());
    $token = password_hash(mt_rand(), PASSWORD_DEFAULT);
    $rememberStmt = $this->db->prepare('
      INSERT INTO tokens (id, token, user_id)
      VALUES(:id, :token, :user_id)
      ON DUPLICATE KEY UPDATE token = :token;
    ');
    $rememberStmt = DB::bindValues($rememberStmt, [
        'id' => $id, 'user_id' => $userId, 'token' => $token
    ], self::TOKEN_TYPES);
    if ($rememberStmt->execute()) {
      $cookie = "$id;$token";
      return setcookie('rememberme', $cookie, (time() + 604800), '/', '', false, true);
    } else {
      return false;
    }
  }
  private function deleteCookie($userId) {
    setcookie('rememberme', false, time() - 604800, '/', '', false, true);
    return $this->db->exec("
        DELETE FROM tokens WHERE user_id = $userId
    ");
  }
  // Find a user with username or email that matches the password
  private function findUser($username, $password) {
    $selectStmt = $this->db->prepare('
      SELECT * FROM users
      WHERE username = :username
      OR email = :username;
    ');
    $selectStmt->bindValue(':username', $username, PDO::PARAM_STR);
    if ($selectStmt->execute()) {
      $userInfo = $selectStmt->fetch(PDO::FETCH_ASSOC);
      return password_verify($password, $userInfo['password']) ? $userInfo : false;
    }
    return false;
  }
}