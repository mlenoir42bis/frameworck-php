<?php

class LaboratoryController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function insertMember()
  {
    $name = isset($_POST['name'])?$_POST['name']:null;
    $fonction = isset($_POST['fonction'])?$_POST['fonction']:null;

    $_POST['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $_POST['fonction'] = htmlspecialchars($_POST['fonction'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($name) || $name==""){
        $errorMsg[] = "name is required";
    }
    if(!isset($fonction) || $fonction==""){
        $errorMsg[] = "Fonction is required";
    }
    if($_FILES['file']['error'] == 4){
        $errorMsg[] = "File is required";
    }

    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {

      $image = $_FILES['file']['name'];
      $extension = substr($image, strrpos($image, '.') + 1);
      $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
      $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

      $rootUpload = ROOT . '/webroot/upload/';
      if(!is_dir($rootUpload)) {
        mkdir(($rootUpload), 0777, true);
      }

      $upload = new upload();
      $ret = $upload->uploadImg($_FILES, 100000, $rootUpload);
      if ($ret['resUpload'] == true) {
        $laboratoryManager = new Laboratory_manager();
        $laboratoryEntity = new Laboratory_entity();
        $laboratoryEntity->hydrate($_POST);
        $laboratoryEntity->setPic($image);
        $ret = $laboratoryManager->insert($laboratoryEntity);
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
  public function updMember()
  {
    $name = isset($_POST['name'])?$_POST['name']:null;
    $fonction = isset($_POST['fonction'])?$_POST['fonction']:null;

    $_POST['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $_POST['fonction'] = htmlspecialchars($_POST['fonction'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($name) || $name==""){
        $errorMsg[] = "name is required";
    }
    if(!isset($fonction) || $fonction==""){
        $errorMsg[] = "Fonction is required";
    }

    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {

      if($_FILES['file']['error'] == 4) {
        $laboratoryManager = new Laboratory_manager();
        $laboratoryEntity = new Laboratory_entity();
        $laboratoryEntity->hydrate($_POST);
        $ret = $laboratoryManager->update($laboratoryEntity);
        if (!$ret) {
          $ret = "Error in insertion";
        }
      }
      else {
        $image = $_FILES['file']['name'];
        $extension = substr($image, strrpos($image, '.') + 1);
        $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

        $rootUpload = ROOT . '/webroot/upload/';
        if(!is_dir($rootUpload)) {
          mkdir(($rootUpload), 0777, true);
        }

        $upload = new upload();
        $ret = $upload->uploadImg($_FILES, 100000, $rootUpload);
        if ($ret['resUpload'] == true) {
          $laboratoryManager = new Laboratory_manager();
          $laboratoryEntity = new Laboratory_entity();

          $laboratory = $laboratoryManager->getById($id);
          if ($laboratory['pic'])
          {
            $rootUpload = ROOT . '/webroot/upload/' . $laboratory['pic'];
            if (file_exists($rootUpload)) {
              unlink($rootUpload);
            }
          }

          $laboratoryEntity->hydrate($_POST);
          $laboratoryEntity->setPic($image);
          $ret = $laboratoryManager->updateWithPic($laboratoryEntity);
          if (!$ret) {
            $ret = "Error in insertion";
          }
        }
      }
    }

    header('Content-type: text/plain');
    echo json_encode($_POST);
  }
  public function getMember()
  {
    $laboratoryManager = new Laboratory_manager();
    $ret = $laboratoryManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getMemberById()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $laboratoryManager = new Laboratory_manager();
      $ret = $laboratoryManager->getById($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $laboratoryManager = new Laboratory_manager();

      $laboratory = $laboratoryManager->getById($id);
      if ($laboratory['pic'])
      {
        $rootUpload = ROOT . '/webroot/upload/' . $laboratory['pic'];
        if (file_exists($rootUpload)) {
          unlink($rootUpload);
        }
      }

      $ret = $laboratoryManager->delete($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function updDesc()
  {
    $description=isset($_POST['description'])?$_POST['description']:null;

    $_POST['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($description) || $description==""){
        $errorMsg[] = "Description is required";
    }
    $sessionManager = new session_manager();
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $descriptionManager = new description_manager();
      $ret = $descriptionManager->update($description, 2);
      if (!$ret) {
        $ret = "Error in update";
      }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
