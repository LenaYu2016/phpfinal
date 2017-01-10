<?php

namespace Project\Classes;

/**
 * Page class is responsible for dynamically generating a page.
 * The simplest way to use is:
 *   $view = new View();
 *   $view->render('/path/to/targetFile');
 * Need to use absolute path, and do not add .php after it.
 * Only support php file for now.
 * This way, it assumes css, js, and title have the same name.
 *
 * It is also possible to pass in array of options.
 *
 *
 * @Author Yi Zhao
 */

class View {
  private $title = '';
  private $header = '';
  private $footer = '';
  private $content = [];
  private $css = [];
  private $js = [];

  private $HTML = '
    <html>
      <head>
       <title>%title%</title>
       %css%
      </head>
      <body>
        %header%
        %content%
        %footer%
        %js%
      </body>
    </html>
  ';

  public function __construct(array $options = []) {
    $this->set($options);
  }

  // Sets value for different components of the page.
  public function set(array $options) {

    if (isset($options['title'])) $this->title = $options['title'];
    if (isset($options['header'])) $this->header = $this->getRoot() . $options['header'];
    if (isset($options['footer'])) $this->footer = $this->getRoot() . $options['footer'];
    if (isset($options['content'])) $this->content[] = $options['content'];


    if( isset($options['css']) ) {
      $css = $options['css'];
      if (is_string($css)) $css = [$css];
      $this->css = $css;
    }
    if( isset($options['js']) ) {
      $js = $options['js'];
      $js = is_string($js) ? [$js] : $js;
      $this->js = $js;
    }

  }

  /**
   * Replaces default html template with a new one.
   * This is quite powerful because it allows custom template.
   * Example 1:
   *  $view = new View(['title' => 'my title'])
   *  $view->setTemplate(' <h1>%title%</h1> ')
   *  $view->render();
   *  Now the page only has one title tag, other parts are ignored.
   * Example 2:
   *  $view->setTemplate('%content%')
   *  $view->render();
   *  It can be used when everything has already been included in another file
   *
   * @param string $template New html template string
   */
  public function setTemplate($template) {
    $this->HTML = $template;
  }
  // Includes predefined contents to current page, also add css and js files.
  public function render($fileName = null, $title = null, $variables = []) {
    if ($fileName) $this->quickSet($fileName);
    if ($title) $this->title = $title;
    return str_replace(
        ['%title%', '%css%', '%header%', '%content%', '%footer%', '%js%'], [
        $this->title,
        $this->addCSS(),
        self::addContent($this->header),
        self::addContent($this->content, $variables),
        self::addContent($this->footer),
        $this->addJS()],
        $this->HTML);
  }
  // Renders JSON
  public function json($variable) {
    header('Content-Type: application/json');
    return json_encode($variable);
  }

  // Static functions
  public static function addContent($templates, $variables = []) {
    ob_start();
    extract($variables);
    if (!is_array($templates)) $templates = [$templates];
    foreach ($templates as $template) {
      if (is_array($template)) {
        foreach ($template as $item) {
          include_once $item;
        }
      }else {
        include_once $template;
      }
    }
    return ob_get_clean();
  }

  // Private functions

  private function getRoot() {
    return $_SERVER['DOCUMENT_ROOT'];
  }
  private function addCSS() {
    $output = '';
    foreach ($this->css as $css) {
      $output .= "<link rel='stylesheet' href='$css' />";
    }
    return $output;
  }
  private function addJS() {
    $output = '';
    foreach ($this->js as $js) {
      $output .= "<script src='$js'></script>";
    }
    return $output;
  }
  // Provides an easier way to setup a page.
  // Assumes php, js, and css files have the same name.
  private function quickSet($fileName) {
    $root = $this->getRoot();
    $pattern = '/\/\w+$/';
    preg_match($pattern, $fileName, $name);
    $name = !empty($name) ? substr($name[0], 1) : $fileName;
    !empty($this->title) || $this->title = $name;
//    !empty($this->header) || $this->header = $root . preg_filter($pattern, '/header.php', $fileName);
//    !empty($this->footer) || $this->footer = $root . preg_filter($pattern, '/footer.php', $fileName);
    $this->content[] = $root . $fileName . '.php';
    if(empty($this->js)) $this->js[] = '/js/' . $name . '.js';
    if(empty($this->css))$this->css[] = '/css/' . $name . '.css';
  }
}