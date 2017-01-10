<?php

namespace Project\Classes\Router;

/**
 * Class Router
 *
 * @Author: Yi Zhao
 * @method void get($path, $callback)
 * @method void post($path, $callback)
 */
class Router {
  /**
   * @var Route[]
   */
  private $routes = [];
  private $baseDir = '';

  public function __call($name, $arguments) {
    list($pathAsName, $callback) = $arguments;
    array_push($this->routes, $this->add($pathAsName, $callback, $name));
  }

  public function startRouting($base = '') {
    foreach ($this->routes as $route) {
      if ( is_object($route) && $route->match($base)) {
        return true;
      }
    }
    return false;
  }

  protected function add($pathAsName, $action, $method = 'GET') {
    list($path, $name) = self::separateName($pathAsName);
    return new Route($this->baseDir . $path, $name, $method, $action);
  }

  protected function separateName($pathAsName) {
    return strpos($pathAsName, ' as ') ? explode(' as ', $pathAsName) : [$pathAsName, null];
  }
}

