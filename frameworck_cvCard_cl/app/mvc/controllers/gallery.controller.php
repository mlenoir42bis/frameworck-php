<?php

class GalleryController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function insert()
  {
      $errorMsg = array();
      if($_FILES['file']['error'] == 4){
          $errorMsg[] = "file is required";
      }
      if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
      }
      else {

        $image = $_FILES['file']['name'];
        $extension = substr($image, strrpos($image, '.') + 1);
        $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

        $rootUpload = ROOT . '/webroot/upload/gallery/';
        if(!is_dir($rootUpload)) {
          mkdir(($rootUpload), 0777, true);
        }

        $upload = new upload();
        $ret = $upload->uploadImg($_FILES, 100000, $rootUpload);
        if ($ret['resUpload'] == true) {
          $galleryManager = new Gallery_manager();
          $galleryEntity = new Gallery_entity();
          $galleryEntity->setPicture($image);
          $ret = $galleryManager->insert($galleryEntity);
          if (!$ret) {
            $ret = "Error in insertion";
          }
        }
        else {
          $ret = $ret['msg'];
        }
      }
      header('Content-type: text/plain');
      echo json_encode($ret);
  }
  public function get()
  {
    $galleryManager = new Gallery_manager();
    $ret = $galleryManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;
    $name=isset($_POST['name'])?$_POST['name']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);

    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(!isset($name) || $name==""){
        $errorMsg[] = "Name is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $galleryManager = new Gallery_manager();
      $ret = $galleryManager->delete($id);
      if ($ret) {
        $rootUpload = ROOT . '/webroot/upload/gallery/' . $name;
        if (file_exists($rootUpload)) {
          unlink($rootUpload);
        }
      }
    }
    header('Content-type: text/plain');
    echo json_encode($rootUpload);
  }
}
