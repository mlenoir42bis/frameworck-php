<?php

class Router
{
  protected $uri;
  protected $controller;
  protected $action;
  protected $params;

  function getUri() {
      return $this->uri;
  }

  function getController() {
      return $this->controller;
  }

  function getAction() {
      return $this->action;
  }

  function getParams() {
      return $this->params;
  }

  function setUri($uri) {
      $this->uri = $uri;
  }

  function setController($controller) {
      $this->controller = $controller;
  }

  function setAction($action) {
      $this->action = $action;
  }

  function setParams($params) {
      $this->params = $params;
  }

  function __construct($uri)
  {
    $this->controller = Config::get("default_controller");
    $this->action = Config::get("action");

    $uri_parts = explode("?", $uri);
    $path = $uri_parts[0];
    $path_parts = explode("/", $path);

    if (count($path_parts) >= 3) {
        if ($path_parts[2] != "") {
            header("Location: /page/error404/");
        }
    }

    if (count($path_parts)) {
      if (current($path_parts)) {
        $this->controller = strtolower(current($path_parts));
        array_shift($path_parts);
      }
      if (current($path_parts)) {
        $this->action = strtolower(current($path_parts));
        array_shift($path_parts);
      }
        $this->params = current($path_parts);      
    }
  }

}

 ?>
