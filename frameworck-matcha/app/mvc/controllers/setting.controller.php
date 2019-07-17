<?php

class SettingController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function updateSettingData() {

    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idProfil = isset($id)?$id:null;

    $name=isset($_POST['name'])?$_POST['name']:null;
    $firstname=isset($_POST['firstname'])?$_POST['firstname']:null;
    $email=isset($_POST['email'])?$_POST['email']:null;

    $usersManager = new Users_manager();
    $verificator = new Verificator();

    $errorMsg = array();
    if(!isset($idProfil) || $idProfil==""){
        $errorMsg[] = "id Profil unknown";
    }
    if(!isset($name) || $name==""){
        $errorMsg[] = "Enter your name";
    }
    if(!isset($firstname) || $firstname==""){
        $errorMsg[] = "Enter your firstname";
    }
    if(!isset($email) || $email==""){
        $errorMsg[] = "Enter your email";
    }
    if($verificator->checkEmail($email)){
        $errorMsg[] = "The format of this email is incorrect";
    }
    if($usersManager->emailExistWithoutId($email, $idProfil)){
        $errorMsg[] = "This email already exist";
    }

    if(count($errorMsg)>0) {
        $sessionManager->errorMessage = implode("<br/>", $errorMsg);
        $displayMsg = new displayMessage();
        $ret = $displayMsg->create();
    }
    else {
        $usersManager->update($idProfil, $name, $firstname, $email);
        $sessionManager->email = $email;
        $sessionManager->name = $name;
        $sessionManager->firstname = $firstname;
        $ret = true;
    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function updateSettingPassword() {

    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idProfil = isset($id)?$id:null;

    $cPass=isset($_POST['currentPass'])?$_POST['currentPass']:null;
    $nPass=isset($_POST['newsPass'])?$_POST['newsPass']:null;

    $usersManager = new Users_manager();

    $errorMsg = array();
    if(!isset($idProfil) || $idProfil==""){
        $errorMsg[] = "id Profil unknown";
    }
    if(!isset($cPass) || $cPass==""){
        $errorMsg[] = "Enter your current password";
    }
    if(!isset($nPass) || $nPass==""){
        $errorMsg[] = "Enter your news password";
    }
    if(strlen($nPass) < 6){
        $errorMsg[] = "News password too short -> Minimum 6 character";
    }

    $res = false;
    if(count($errorMsg)<=0) {
      $dataProfil = $usersManager->selectById($idProfil);
      if (!$dataProfil) {
          $errorMsg[] = "Error in process";
      }
      else if (!password_verify($cPass, $dataProfil["password"])) {
          $errorMsg[] = "Your current password is not right";
      }
      else {
        $nPass = password_hash($nPass, PASSWORD_BCRYPT);
        $res = $usersManager->updatePasswordUserByEmail($dataProfil["email"], $nPass);
      }
    }

    if ($res) {
      $ret = true;
    }
    else {
      $ret = "Error in process : " . implode("<br/>", $errorMsg);
    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
?>
