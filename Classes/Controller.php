<?php
namespace Project\Classes;

/**
 * Class Controller
 * Controller class, all controllers should inherit this class.
 * @package Project\Classes
 * @author Yi
 */
abstract class Controller {
  protected $model;
  protected $view;

  /**
   * Make json result easier and consistent.
   *
   * @param $result boolean
   * @param $errors string
   * @return array
   */
  public function resultArray($result, $errors) {
    $output = [ 'success' => false, 'error' => [] ];
    if ($result) {
      $output['success'] = true;
    }else {
      $output['error'][] = $errors;
    }
    return $output;
  }

}