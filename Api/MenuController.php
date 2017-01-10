<?php

namespace Project\Api;

use Project\Classes\Controller;
use Project\Classes\Request;
use Project\Classes\View;
use Project\Menu\Menu;

class MenuController extends Controller{
  protected $model;
  protected $view;

  public function __construct() {
    $this->view = new View();
    $this->model = new Menu();
  }

  // GET /menu/:name
  public function Menu($name) {
    $menus = $this->model->getMenuAll();
    if (isset($name)) {
      foreach ($menus as $menu) {
        if ( $menu['name'] == $name ) return $this->view->json($menu['menu']);
      }
      return $this->view->json($this->resultArray(false, 'no such menu'));
    }
  }

  // GET /menu
  public function MenuAll() {
    $menus = $this->model->getMenuAll();
    return $this->view->json($menus);
  }

  // POST /menu
  public function SaveMenu(Request $request) {
    $result = $this->model->saveMenu($request->param('menu'));
    return $this->view->json($this->resultArray($result, null));
  }


}