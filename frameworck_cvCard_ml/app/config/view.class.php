<?php

class view
{
  protected $data;
  protected $path;

  public static function getDefaultViewPath()
  {
      $router = App::getRouter();
      if (!$router) {
        return false;
      }
      $controller_dir = $router->getController();
      $template_name = $router->getAction().".php";
      return MVC.DS."views".DS.$controller_dir.DS.$template_name;
  }

  function __construct($data = array(), $path = null)
  {
    if (!$path) {
      $path = self::getDefaultViewPath();
    }
    if (!file_exists($path)) {
      throw new Exception("This template don't exist : ' -> $path' ", 1);
      //header("Location: /page/index/");
    }
    $this->data = $data;
    $this->path = $path;
  }
  public function render() {
    $data = $this->data;
    ob_start();
    include $this->path;
    $content = ob_get_clean();
    return $content;
  }
}
