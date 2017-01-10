<?php
/**
 * @Author Yi Zhao
 *
 */

namespace Project\Classes\Router;


use Project\Classes\Request;

class Route {
  private $path;
  private $name;
  private $method;
  private $callback;
  private $resolver;
  private $routeParam;

  /**
   * Route constructor.
   *
   * @param $path string
   * @param $name string
   * @param $method string
   * @param callable $callback
   */
  public function __construct($path, $name, $method, $callback) {
    $this->resolver = new RouteCallbackResolver();

    $route = $this->getRouteParam($path);
    $this->routeParam = $route['param'];
    // Set route to correct format if there is route param so it is not like /path/:param
    $this->path = !empty($this->routeParam) ? $route['route'] . '/' . $this->routeParam : $path;
    $this->name = $name;
    $this->method = $method;
    $this->callback = $callback;
  }

  // Match current url with stored url, and echo the return value of the controller.
  public function match($base = '/') {
    $request = new Request();
//    var_dump('Route base--', $base);
//    var_dump('request', $request->requestURL());
//    var_dump('match', $base . $this->path);
    $path = $base . $this->path;
    // takeout extra slash
    $path = str_replace('//', '/', $path);
    if (strtolower($request->requestURL()) == strtolower($path) &&
        strtolower($request->method()) == strtolower($this->method)
    ) {

      // Resolve dependency
      $page = $this->resolver->resolveCallback($this->callback, [$this->routeParam]);
      echo $page;
      return true;
    }
    return false;
  }

  public function getProp($propName) {
    return $this->$propName;
  }

  public function setProp($propName, $value) {
    $this->$propName = $value;
  }


  private function getRouteParam($route) {
    $output = ['param' => '', 'route' => $route];
    if (preg_match('/(.+\/):(.+)/', $route, $match)) {
      $start = strpos($_SERVER['REQUEST_URI'], $match[1]) + strlen($match[1]);
      $output['route'] = $match[1];
      $output['param'] = htmlspecialchars(substr($_SERVER['REQUEST_URI'], $start));
    }
    return $output;
  }

}