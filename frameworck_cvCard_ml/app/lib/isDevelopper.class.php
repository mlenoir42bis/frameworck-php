<?php

class isevelopper{

  function get_frameworck() {
    $handler = fopen('php://input', 'r');
    $this->request = stream_get_contents($handler);
    return $this->request;
  }

  function is_dev_mode($mode = 0) {
    switch ($mode) {
      case 0:
           //echo "err is_developper_mode";
           throw new Exception("The class ---- $class_name ----  unckown");
          break;
      case 1:
           echo "out is_developper_mode";
          //header("Location: /page/index/");
          break;
    }
  }

}
