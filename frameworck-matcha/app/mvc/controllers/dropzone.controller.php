<?php

class DropzoneController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function getFile(){

    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $email = $sessionManager->email;

    $id = isset($id)?$id:null;
    $email = isset($email)?$email:null;

    $err = false;
    if (!$id) {
      $output[] = "Unknown id profil (Error script)";
      $err = true;
    }
    else if (!$email) {
      $output[] = "Unknown email profil (Error script)";
      $err = true;
    }
    else {
      $dropzoneManager = new Dropzone_manager();
      $output = $dropzoneManager->getByIdUser($id);
      $output['dir'] = '../../../../webroot/upload/' . $email . '.' . $id . '/';
    }

    if ($err){
      header('HTTP/1.1 500 Internal Server Error');
      header( 'Content-Type: application/json; charset=utf-8' );
    }
    else {
      header('Content-type: text/plain');
    }
    echo json_encode($output);
  }

  public function updateStatusFile()
  {
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idProfil = isset($id)?$id:null;

    $idImg=isset($_POST['id'])?$_POST['id']:null;

    $errorMsg = array();
    if(!isset($idImg) || $idImg==""){
        $errorMsg[] = "Id picture uncknow";
    }
    if(!isset($idProfil) || $idProfil==""){
        $errorMsg[] = "Id profil uncknow (error script)";
    }

    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {

      $dropzoneManager = new Dropzone_manager();
      $req1 = $dropzoneManager->updateStatusByIdUser($idProfil, 0);
      $req2 = $dropzoneManager->updateStatusById($idImg, 1);

      if (!$req1 || $req2) {
        $ret = "Error in Update";
      }
      else {
        $ret = true;
      }
    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }

  public function deleteFile()
  {
    $idImg=isset($_POST['id'])?$_POST['id']:null;

    $sessionManager = new Session_manager();
    $idUser = $sessionManager->id;
    $email = $sessionManager->email;

    $idUser = isset($idUser)?$idUser:null;
    $email = isset($email)?$email:null;

    $errorMsg = array();
    if(!isset($idImg) || $idImg==""){
        $errorMsg[] = "Id picture uncknow";
    }
    if (!$idUser) {
      $errorMsg[] = "Unknown id profil (Error script)";
    }
    if (!$email) {
      $errorMsg[] = "Unknown email profil (Error script)";
    }

    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {

      $dropzoneManager = new Dropzone_manager();
      $img = $dropzoneManager->getById($idImg);
      $req = $dropzoneManager->delete($idImg);

      $rootUploadUser = ROOT . '/webroot/upload/' . $email . '.' . $idUser . '/';
      $file = $rootUploadUser . $img[0]['name'];
      unlink($file);

      if (!$req) {
        $ret = "Error in delete";
      }
      else {
        $ret = true;
      }
    }

    header('Content-type: text/plain');
    echo json_encode($file);
  }

  public function upload()
  {
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $email = $sessionManager->email;

    $id = isset($id)?$id:null;

    $errorMsg = array();
    if(!isset($id) || $id=="" || !isset($email) || $email==""){
        $errorMsg[] = "Error on data user";
    }
    if(empty($_FILES)){
        $errorMsg[] = "Error transmition data file";
    }

    if(count($errorMsg)>0) {
        $output = implode("<br/>", $errorMsg);
    }
    else {

      $rootUpload = ROOT . '/webroot/upload';
      if(!is_dir($rootUpload)) {
        mkdir(($rootUpload), 0777, true);
      }
      $rootUploadUser = ROOT . '/webroot/upload/' . $email . '.' . $id . '/';
      if(!is_dir($rootUploadUser)) {
        mkdir(($rootUploadUser), 0777, true);
      }

      $dropzoneManager = new Dropzone_manager();
      $nbFile = $dropzoneManager->getCountByIdUser($id);

      $image = $_FILES['file']['name'];
      $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
      $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

      $fileExist = $dropzoneManager->nameExist($image, $id);
      if ($fileExist) {
        $outputUpload['resUpload'] = false;
        $outputUpload['msg'] = "Name file already exist";
        $err = true;
      }
      else if ($nbFile[0] < 5) {

        $upload = new Upload();
        $outputUpload = $upload->uploadImg($_FILES, 1000000, $rootUploadUser);

        if (!$outputUpload["resUpload"]){
          $err = true;
        }
        else {
          $dropzoneEntity = new dropzone_entity();
          $dropzoneEntity->setName($outputUpload['img']);
          $dropzoneEntity->setId_user($id);
          $ret = $dropzoneManager->insert($dropzoneEntity);
          if (!$ret) {
            $outputUpload["resUpload"] = false;
            $outputUpload["msg"] = "Error in insertion in base";
            $file = $rootUploadUser . $outputUpload["img"];
            unlink($file);
            $err = true;
          }
          else {
            $outputUpload["idImg"] = $ret;
            $outputUpload["dir"] = '../../../../webroot/upload/' . $email . '.' . $id . '/';
            $err = false;
          }
        }

      }
      else {
        $outputUpload['resUpload'] = false;
        $outputUpload['msg'] = "You have asser upload - max five file";
        $err = true;
      }

    }

    if ($err){
      header('HTTP/1.0 400 Bad Request');
      header( 'Content-Type: application/json; charset=utf-8' );
    }
    else {
      header('Content-type: text/plain');
    }

    echo json_encode($outputUpload);
  }
}
