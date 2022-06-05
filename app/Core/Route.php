<?php

class Route {
    
  protected $controller = 'homeController';
  protected $method     = 'index';
  protected $params     = [];

  public function __construct()
  {
    // Get the URL
    if (isset($_GET['url'])) {
      $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
      $url[0] = $url[0] . 'Controller';
    } else {
      $url[0] = $this->controller;
    }

    // Check if the file exists
    if (file_exists('../app/Controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
    } else {
      return require_once '../app/Views/Error/404.php';
    }

    require_once '../app/Controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    if (isset($url[1])) {
        // Check if the Method exists
        if (method_exists($this->controller, $url[1])) {
          $this->method = $url[1];
        }
    }
    
    unset($url[0], $url[1]);
    $this->params = $url;

    call_user_func_array([$this->controller, $this->method], $this->params);
  }
}