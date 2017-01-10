<?php

namespace Project\Api;


use Project\Classes\Controller;
use Project\Classes\Request;
use Project\Classes\View;
use Project\Menu\Page;

class PageController extends Controller{

  public function __construct() {
    $this->view = new View();
    $this->model = new Page();
  }

  // PUT /page/:id
  public function UpdatePage($id, Request $request) {
    $result = $this->model->update($id, $request->param('content'), $request->param('name'), $request->param('link'));
    return $this->view->json($this->resultArray($result, null));
  }

  // GET /page/:id
  public function GetPage($id) {
    $info = $this->model->get($id);
    return $this->view->json($info);
  }

  // GET /page
  public function GetAll() {
    return $this->view->json($this->model->getAll());
  }

  // DELETE /page/:id
  public function DeletePage($id) {
    $result = $this->model->delete($id);
    return $this->view->json($this->resultArray($result, null));
  }

  // POST /page
  public function AddPage(Request $request) {
    $result = $this->model->add($request->param('content'), $request->param('name'), $request->param('link'));
    return $this->view->json(['success' => $result, 'id' => $this->model->getLastId()]);
  }

}