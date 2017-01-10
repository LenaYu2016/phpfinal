<?php

namespace Project\Classes;

/**
 * Class Helper
 * Some methods used across classes
 * @package Project\Classes
 * @author Yi
 */
abstract class Helper {

  // Get parameter
  public static function getParam($name, $method = INPUT_POST, $filter=FILTER_SANITIZE_ENCODED) {
    return filter_input($method, $name, $filter);
  }

  // Make sure session start is only called once
  public static function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }


}