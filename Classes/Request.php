<?php

namespace Project\Classes;

/**
 * Class Request
 * @package Project\Classes
 * @author Yi
 */
class Request {
  private $params;
  private $method;

  public function __construct() {
    $this->params = $_REQUEST;
    $this->method = $_SERVER['REQUEST_METHOD'];
    // store
    if ($this->method !== 'GET' && $this->method !== 'POST') {
      $str = file_get_contents("php://input");
      parse_str($str, $params);
      $this->params = $params;
    }
  }

  public function param($key) {
    $value = $this->params[$key];
    if (is_array($value)) return $value;
    return ($value);
  }

  public function requestURL() {
    $url = $_SERVER['REQUEST_URI'];
    $index = strpos($_SERVER['REQUEST_URI'], '?');
    return $index ? substr($url, 0, $index) : $url;
  }
  
  public function method() {
    return $_SERVER['REQUEST_METHOD'];
  }
}