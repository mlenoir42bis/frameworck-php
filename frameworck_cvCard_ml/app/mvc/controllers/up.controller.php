<?php

class upController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function set()
  {
    error_reporting(0);
    $security = new security();
    
    $postMaxSize = $security->postMaxSize();
    if ($postMaxSize) {
      $ret = ['error' => true, 'dataError' => ['status' => 103, 'message' => "Post content size to large"]];
      header('Content-type: text/plain');
      echo json_encode($ret);
      die();
    }

    $rootUpload = ROOT . '/webroot/upload/gallery/';

    $upload = new Upload();
    $arrayExtension = ['jpg', 'png', 'jpeg'];
    $ret = $upload->uploadMultiple($_FILES, 'file', $rootUpload, 1000000000, $arrayExtension);

    header('Content-Type: text/plain');
    echo json_encode($ret);
    die();
  }
}
