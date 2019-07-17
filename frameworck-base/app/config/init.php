<?php
/*
*
*
****
*
*
*

Class controller

public function :-> init($class_name)
params:
  1. class_name : 



*
*
****
*
*

*/
  function init($class_name)
  {
    $conf_path = CONF.DS.strtolower($class_name).".class.php";
    $lib_path = LIB.DS.strtolower($class_name).".class.php";
    $controller_path = MVC.DS."controllers".DS.strtolower(str_replace("controller", "", strtolower($class_name))).".controller.php";
    $entity_path = MVC.DS."modele".DS."entity".DS.strtolower($class_name).".php";
    $manager_path = MVC.DS."modele".DS."manager".DS.strtolower($class_name).".php";

    if (file_exists($conf_path)){
      require_once($conf_path);
    }elseif (file_exists($controller_path)){
      require_once($controller_path);
    }elseif (file_exists($entity_path)){
      require_once($entity_path);
    }elseif (file_exists($manager_path)){
      require_once($manager_path);
    }elseif (file_exists($lib_path)){
      require_once($lib_path);
    }else {
      //throw new Exception("The class ---- $class_name ----  unckown");
      header("Location: /page/index/");
    }
  }

  spl_autoload_register('init');

 ?>
