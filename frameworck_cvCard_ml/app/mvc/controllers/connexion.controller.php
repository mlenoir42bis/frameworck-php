<?php

class ConnexionController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function signOut()
  {
    $sessionManager = new Session_manager();
    $sessionManager->destroy();
    $sessionManager->restart();
    $sessionManager->infoMessage = "Your session is over";
    header("Location: /page/index/");
  }
  public function signIn()
  {
    $email = isset($_POST['email'])?$_POST['email']:null;
    $password = isset($_POST['password'])?$_POST['password']:null;

    $email = htmlspecialchars($email, ENT_QUOTES);
    $password = htmlspecialchars($password, ENT_QUOTES);

    $sessionManager = new Session_manager();
    $verificator = new Verificator();
    $usersManager = new Users_manager();

    $errorMsg = array();
    if(!isset($email) || $email==""){
        $errorMsg[] = "Enter your Email";
    }
    if($verificator->checkEmail($email)){
        $errorMsg[] = "The format of this email is incorrect";
    }
    if(!$usersManager->emailExist($email)){
        $errorMsg[] = "This email does not exist";
    }
    if(!isset($password) || $password==""){
        $errorMsg[] = "Enter your password";
    }
    if(count($errorMsg)>0){
        $msg = implode("<br />", $errorMsg);
        $sessionManager->errorMessage = $msg;
        header("Location: /page/signin/");
    }
    if($usersManager->validation($email, $password)){
        $sessionManager->infoMessage = "Welcome";
        header("Location: /page/home/");
    }
    else{
        $sessionManager->errorMessage = "Authentification error ...";
        header("Location: /page/signin/");
    }
  }

}
