<?php

class App
{
  protected static $router;
  protected static $db;

  public static function getRouter()
  {
    return self::$router;
  }
  public static function run($uri)
  {

    self::$router = new Router($uri);

    $class = str_replace(" ", "", self::$router->getController());

    $controller_class = ucfirst($class.'Controller');
    $controller_method = strtolower(self::$router->getAction());

    $controller_object = new $controller_class();

    if ($controller_class != "PageController") {
      $controller_object->$controller_method();
    }
    else {

      if (method_exists($controller_object, $controller_method))
      {
        $view_path = $controller_object->$controller_method();
        $view_obj = new View($controller_object->getData(), $view_path);
        $content = $view_obj->render();
      }
      else {
        //throw new Exception("This method don't exist");
        header("Location: /page/index/");
      }
      $layout = Config::get("default_layout").".php";
      $layout_path = APP.DS."templates".DS.$layout;
      $layout_view_obj = new View(compact("content"), $layout_path);
      echo $layout_view_obj->render();
    }

  }
}
