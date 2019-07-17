<?php

  function init($class_name)
  {
    $conf_path = CONF.DS.strtolower($class_name).".class.php";
    $lib_path = LIB.DS.strtolower($class_name).".class.php";
    $controller_path = MVC.DS."controllers".DS.strtolower(str_replace("controller", "", strtolower($class_name))).".controller.php";

    if (file_exists($conf_path)){
      require_once($conf_path);
    }elseif (file_exists($controller_path)){
      require_once($controller_path);
    }elseif (file_exists($lib_path)){
      require_once($lib_path);
    }else {
      throw new Exception("The class ---- $class_name ----  unckown");
    }
  }

  spl_autoload_register('init');

 ?>
