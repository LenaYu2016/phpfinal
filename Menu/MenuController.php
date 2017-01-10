<?php

namespace Project\Menu;


use Project\Classes\Controller;
use Project\Classes\View;

class MenuController extends Controller{

  public function __construct() {
    $this->view = new View([
        'header' => '/Assets/html/header.php',
        'footer' => '/Assets/html/footer.php'
    ]);
  }

  // GET /page/:id
  public function GetPage($id) {
    $page = Page::get($id);
    return $this->renderPage($page['content']);
  }


  private function renderPage($content) {
    $template = "
      %header%
      <div class='container'>
        $content
      </div>
      %footer%
    ";
    $this->view->setTemplate($template);
    return $this->view->render();
  }
}