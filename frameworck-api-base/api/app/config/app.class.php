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

      if (method_exists($controller_object, $controller_method))
      {
        $view_path = $controller_object->$controller_method();
      }
      else {
        throw new Exception("This method don't exist");
        //header("Location: /page/index/");
      }
    
  }
}
