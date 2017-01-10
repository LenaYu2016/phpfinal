<?php

namespace Project\Classes\Router;


class RouteCallbackResolver {

  /**
   * Parse and the callback function. Instantiate dependent classes and add them to parameter
   *
   * @param string|callable $callback
   * @return mixed Return value of the callback.
   */
  public function resolveCallback($callback, $additionalParams = []) {
    $parsedCallback = $this->parse($callback);
    $methodParams = $this->generateParams($parsedCallback['reflection']);
    $allParams = array_filter( array_merge($additionalParams, $methodParams), function ($item) {
      return !empty($item);
    });
    $methodParams = !empty($allParams) ? $allParams : [];
    return call_user_func_array($parsedCallback['method'], $methodParams);
  }

  /**
   * Parse the callback
   *
   * @param \Closure|string $callback
   * @return array Contains method can be used to call function and the Reflection of callback function
   * @throws \Exception Syntax Error
   */
  private function parse($callback) {
    if (is_callable($callback)) {
      return [
          'method' => $callback,
          'reflection' => new \ReflectionFunction($callback)
      ];
    }

    if (is_string($callback) && preg_match('/.+@.+/', $callback) == 1) {
      list ($controller, $action) = explode('@', $callback);
      return [
          'method' => [new $controller, $action],
          'reflection' => new \ReflectionMethod($controller, $action)
      ];
    }
    throw new \Exception('Syntax Error');
  }

  /**
   * Create new instance of each dependency. Null if the parameter is not typed.
   *
   * @param \ReflectionFunctionAbstract $reflection
   * @return array Array of instance of dependencies.
   */
  private function generateParams(\ReflectionFunctionAbstract $reflection) {
    $params = $reflection->getParameters();

    return array_reduce($params, function ($acc, \ReflectionParameter $param) {
      $class = $param->getClass();
      if ($class != null) $acc[] = new $class->name();
      return $acc;
    }, []);
  }


}
