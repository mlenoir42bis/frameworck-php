<?php

class PublicationController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function updDesc()
  {
    $description=isset($_POST['description'])?$_POST['description']:null;

    $_POST['description']= htmlspecialchars($_POST['description'], ENT_QUOTES);

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
      $ret = $descriptionManager->update($description, 3);
      if (!$ret) {
        $ret = "Error in update";
      }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function update()
  {
    $title=isset($_POST['title'])?$_POST['title']:null;
    $author=isset($_POST['author'])?$_POST['author']:null;
    $release=isset($_POST['myRelease'])?$_POST['myRelease']:null;
    $type=isset($_POST['type'])?$_POST['type']:null;
    $content=isset($_POST['content'])?$_POST['content']:null;
    $id=isset($_POST['id'])?$_POST['id']:null;
    $dateYear=isset($_POST['dateYear'])?$_POST['dateYear']:null;

    $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $_POST['author'] = htmlspecialchars($_POST['author'], ENT_QUOTES);
    $_POST['myRelease'] = htmlspecialchars($_POST['myRelease'], ENT_QUOTES);
    $_POST['type'] = htmlspecialchars($_POST['type'], ENT_QUOTES);
    $_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);
    $_POST['dateYear'] = htmlspecialchars($_POST['dateYear'], ENT_QUOTES);
    $_POST['id'] = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($title) || $title==""){
        $errorMsg[] = "Title is required";
    }
    if(!isset($author) || $author==""){
        $errorMsg[] = "Author is required";
    }
    if(!isset($release) || $release==""){
        $errorMsg[] = "Release is required";
    }
    if(!isset($type) || $type==""){
        $errorMsg[] = "Type is required";
    }
    if(!isset($content) || $content==""){
        $errorMsg[] = "Content is required";
    }
    if(!isset($dateYear) || $dateYear==""){
        $errorMsg[] = "DateYear is required";
    }
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    $sessionManager = new session_manager();
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {

            if($_FILES['file']['error'] == 0){
              $image = $_FILES['file']['name'];
              $extension = substr($image, strrpos($image, '.') + 1);
              $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
              $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

              $rootUpload = ROOT . '/webroot/upload/doc/';
              if(!is_dir($rootUpload)) {
                mkdir(($rootUpload), 0777, true);
              }

              $upload = new upload();
              $ret = $upload->uploadDoc($_FILES, 10000000, $rootUpload);
              if (!$ret['resUpload']) {
                $ret = "Upload file error : " . $ret['msg'];
              }
              else {
                $publicationManager = new Publication_manager();
                $publicationEntity = new Publication_entity();

                $publication = $publicationManager->getById($id);
                if ($publication['file'] != NULL)
                {
                  $rootUpload = ROOT . '/webroot/upload/doc/' . $publication['file'];
                  if (file_exists($rootUpload)) {
                    unlink($rootUpload);
                  }
                }

                $publicationEntity->hydrate($_POST);
                $publicationEntity->setFile($image);

                $ret = $publicationManager->updateWithfile($publicationEntity);
                if (!$ret) {
                  $ret = "insertion on error";
                }
              }
            }
            else {
              $publicationManager = new Publication_manager();
              $publicationEntity = new Publication_entity();
              $publicationEntity->hydrate($_POST);
              $ret = $publicationManager->update($publicationEntity);
              if (!$ret) {
                $ret = "insertion on error";
              }
            }

    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function insert()
  {
    $title=isset($_POST['title'])?$_POST['title']:null;
    $author=isset($_POST['author'])?$_POST['author']:null;
    $release=isset($_POST['myRelease'])?$_POST['myRelease']:null;
    $type=isset($_POST['type'])?$_POST['type']:null;
    $content=isset($_POST['content'])?$_POST['content']:null;
    $dateYear=isset($_POST['dateYear'])?$_POST['dateYear']:null;

    $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $_POST['author'] = htmlspecialchars($_POST['author'], ENT_QUOTES);
    $_POST['myRelease'] = htmlspecialchars($_POST['myRelease'], ENT_QUOTES);
    $_POST['type'] = htmlspecialchars($_POST['type'], ENT_QUOTES);
    $_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);
    $_POST['dateYear'] = htmlspecialchars($_POST['dateYear'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($title) || $title==""){
        $errorMsg[] = "Title is required";
    }
    if(!isset($author) || $author==""){
        $errorMsg[] = "Author is required";
    }
    if(!isset($release) || $release==""){
        $errorMsg[] = "Release is required";
    }
    if(!isset($type) || $type==""){
        $errorMsg[] = "Type is required";
    }
    if(!isset($content) || $content==""){
        $errorMsg[] = "Content is required";
    }
    if(!isset($dateYear) || $dateYear==""){
        $errorMsg[] = "DateYear is required";
    }
    $sessionManager = new session_manager();
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {

      if($_FILES['file']['error'] == 0){
        $image = $_FILES['file']['name'];
        $extension = substr($image, strrpos($image, '.') + 1);
        $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

        $rootUpload = ROOT . '/webroot/upload/doc/';
        if(!is_dir($rootUpload)) {
          mkdir(($rootUpload), 0777, true);
        }

        $upload = new upload();
        $ret = $upload->uploadDoc($_FILES, 10000000, $rootUpload);
        if (!$ret['resUpload']) {
          $ret = "Upload file error : " . $ret['msg'];
        }
        else {
          $publicationManager = new Publication_manager();
          $publicationEntity = new Publication_entity();
          $publicationEntity->hydrate($_POST);
          $publicationEntity->setFile($image);
          $ret = $publicationManager->insert($publicationEntity);
          if (!$ret) {
            $ret = "insertion on error";
          }
        }
      }
      else {
        $publicationManager = new Publication_manager();
        $publicationEntity = new Publication_entity();
        $publicationEntity->hydrate($_POST);
        $ret = $publicationManager->insert($publicationEntity);
        if (!$ret) {
          $ret = "insertion on error";
        }
      }

    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function get()
  {
    $publicationManager = new Publication_manager();
    $ret = $publicationManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $publicationManager = new Publication_manager();

      $publication = $publicationManager->getById($id);
      if ($publication['file'] != NULL)
      {
        $rootUpload = ROOT . '/webroot/upload/doc/' . $publication['file'];
        if (file_exists($rootUpload)) {
          unlink($rootUpload);
        }
      }
      $ret = $publicationManager->delete($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getById()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $publicationManager = new Publication_manager();
      $ret = $publicationManager->getById($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
