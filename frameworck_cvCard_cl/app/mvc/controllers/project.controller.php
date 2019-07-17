<?php

class ProjectController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function upd()
  {
    $title = isset($_POST['title'])?$_POST['title']:null;
    $description = isset($_POST['description'])?$_POST['description']:null;
    $content = isset($_POST['content'])?$_POST['content']:null;

    $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $_POST['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($title) || $title==""){
        $errorMsg[] = "name is required";
    }
    if(!isset($description) || $description==""){
        $errorMsg[] = "Fonction is required";
    }
    if(!isset($content) || $content==""){
        $errorMsg[] = "Content is required";
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

      if ($_FILES['file']['error'] == 4) {
        $projectManager = new Project_manager();
        $projectEntity = new Project_entity();
        $projectEntity->hydrate($_POST);
        $ret = $projectManager->update($projectEntity);
        if (!$ret) {
          $ret = "Error in update";
        }
      }
      else {
        $upload = new upload();
        $ret = $upload->uploadImg($_FILES, 100000, $rootUpload);
        if ($ret['resUpload'] == true) {
          $projectManager = new Project_manager();
          $projectEntity = new Project_entity();

          $project = $projectManager->getById($id);
          if ($publication['file'] != NULL)
          {
            $rootUpload = ROOT . '/webroot/upload/' . $project['pic'];
            if (file_exists($rootUpload)) {
              unlink($rootUpload);
            }
          }

          $projectEntity->hydrate($_POST);
          $projectEntity->setPic($image);
          $ret = $projectManager->updateWithPic($projectEntity);
          if (!$ret) {
            $ret = "Error in update";
          }
        }
        else {
          $ret = $ret['msg'];
        }
      }

    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function insert()
  {
    $title = isset($_POST['title'])?$_POST['title']:null;
    $description = isset($_POST['description'])?$_POST['description']:null;
    $content = isset($_POST['content'])?$_POST['content']:null;

    $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $_POST['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($title) || $title==""){
        $errorMsg[] = "name is required";
    }
    if(!isset($description) || $description==""){
        $errorMsg[] = "Fonction is required";
    }
    if(!isset($content) || $content==""){
        $errorMsg[] = "Content is required";
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

      if ($_FILES['file']['error'] == 4) {
        $projectManager = new Project_manager();
        $projectEntity = new Project_entity();

        $projectEntity->hydrate($_POST);
        $projectEntity->setPic("");

        $ret = $projectManager->insert($projectEntity);
        if (!$ret) {
          $ret = "Error in insertion";
        }
      }
      else {
        $upload = new upload();
        $ret = $upload->uploadImg($_FILES, 100000, $rootUpload);
        if ($ret['resUpload'] == true) {
          $projectManager = new Project_manager();
          $projectEntity = new Project_entity();

          $projectEntity->hydrate($_POST);
          $projectEntity->setPic($image);

          $ret = $projectManager->insert($projectEntity);
          if (!$ret) {
            $ret = "Error in insertion";
          }
        }
        else {
          $ret = $ret['msg'];
        }
      }

    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getProjectById()
  {
    $id = isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $projectManager = new Project_manager();
      $ret = $projectManager->getById($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getProject()
  {
    $projectManager = new Project_manager();
    $ret = $projectManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete()
  {
    $id = isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $projectManager = new Project_manager();

      $project = $projectManager->getById($id);
      if ($publication['file'] != NULL)
      {
        $rootUpload = ROOT . '/webroot/upload/' . $project['pic'];
        if (file_exists($rootUpload)) {
          unlink($rootUpload);
        }
      }

      $ret = $projectManager->delete($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
