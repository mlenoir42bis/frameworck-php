<?php

class ProfilController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function resume()
  {
    $sessionManager = new session_manager();

    if ($_FILES['file']['error'] == 0) {

      $profilManager = new Profil_manager();

      $image = $_FILES['file']['name'];
      $extension = substr($image, strrpos($image, '.') + 1);
      $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
      $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

      $rootUpload = ROOT . '/webroot/upload/doc/';
      if(!is_dir($rootUpload)) {
        mkdir(($rootUpload), 0777, true);
      }

      $upload = new upload();
      $output = $upload->uploadDoc($_FILES, 100000, $rootUpload);

      if ($output['resUpload'] == true) {
        $profil = $profilManager->get();
        if ($profil[0]['resume'] != NULL)
        {
          $rootUpload = ROOT . '/webroot/upload/doc/' . $profil[0]['resume'];
          if (file_exists($rootUpload)) {
            unlink($rootUpload);
          }
        }

        $output = $profilManager->updateResume($image, 1);
        if ($output) {
          $sessionManager->infoMessage = "Success process";
        }
        else {
          $sessionManager->errorMessage = "Error in Update resume";
        }
      }
      else {
        $sessionManager->errorMessage = "Error in Upload : " . $output['msg'];
      }
    }
    else {
      $sessionManager->errorMessage = "File is required";
    }
    header("Location: /page/home/");
  }
  public function update()
  {
    $name=isset($_POST['name'])?$_POST['name']:null;
    $profession=isset($_POST['profession'])?$_POST['profession']:null;
    $titleBio=isset($_POST['titleBio'])?$_POST['titleBio']:null;
    $bio=isset($_POST['bio'])?$_POST['bio']:null;

    $_POST['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $_POST['profession'] = htmlspecialchars($_POST['profession'], ENT_QUOTES);
    $_POST['titleBio'] = htmlspecialchars($_POST['titleBio'], ENT_QUOTES);
    $_POST['bio'] = htmlspecialchars($_POST['bio'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($name) || $name==""){
        $errorMsg[] = "Name is required";
    }
    if(!isset($profession) || $profession==""){
        $errorMsg[] = "Profession is required";
    }
    if(!isset($titleBio) || $titleBio==""){
        $errorMsg[] = "Title Biographie is required";
    }
    if(!isset($bio) || $bio==""){
        $errorMsg[] = "Biographie is required";
    }
    $sessionManager = new session_manager();
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
      $sessionManager->errorMessage = $ret;
    }
    else {
      $profilManager = new Profil_manager();
      $profilEntity = new Profil_entity();
      $profilEntity->hydrate($_POST);
      $profilEntity->setId(1);

      if ($_FILES['file']['error'] == 4) {
        $output = $profilManager->update($profilEntity);
        if ($output) {
          $sessionManager->infoMessage = "Success process";
        }
        else {
          $sessionManager->errorMessage = "Error in Update";
        }
      }
      else {

        $image = $_FILES['file']['name'];
        $extension = substr($image, strrpos($image, '.') + 1);
        $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

        $profilEntity->setAvatar($image);

        $rootUpload = ROOT . '/webroot/upload/';
        if(!is_dir($rootUpload)) {
          mkdir(($rootUpload), 0777, true);
        }

        $upload = new upload();
        $output = $upload->uploadImg($_FILES, 100000, $rootUpload);

        if ($output['resUpload'] == true) {

          $profil = $profilManager->get();
          if ($profil[0]['avatar'] != NULL)
          {
            $rootUpload = ROOT . '/webroot/upload/' . $profil[0]['avatar'];
            if (file_exists($rootUpload)) {
              unlink($rootUpload);
            }
          }

          $output = $profilManager->updateWithAvatar($profilEntity);
          if ($output) {
            $sessionManager->infoMessage = "Success process";
          }
          else {
            $sessionManager->errorMessage = "Error in Update";
          }
        }
        else {
          $sessionManager->errorMessage = "Error in Upload : " . $output['msg'];
        }
      }
    }
    header("Location: /page/home/");
  }
}
