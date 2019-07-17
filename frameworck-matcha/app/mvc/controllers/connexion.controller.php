<?php

class ConnexionController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function signIn()
  {
    $email = isset($_POST['email'])?$_POST['email']:null;
    $password = isset($_POST['password'])?$_POST['password']:null;

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
        header("Location: /page/signIn/");
    }
    if($usersManager->validation($email, $password)){
        $sessionManager->infoMessage = "Welcome";
        header("Location: /page/home/");
    }
    else{
        $sessionManager->errorMessage = "Authentification error ...";
        header("Location: /page/signIn/");
    }
  }
  public function signOut()
  {
    $sessionManager = new Session_manager();
    $sessionManager->destroy();
    $sessionManager->restart();
    $sessionManager->infoMessage = "Your session is over";
    header("Location: /page/index/");
  }
  public function signUp()
  {
    $name=isset($_POST['name'])?$_POST['name']:null;
    $firstname=isset($_POST['firstname'])?$_POST['firstname']:null;
    $password=isset($_POST['password'])?$_POST['password']:null;
    $email=isset($_POST['email'])?$_POST['email']:null;

    $sessionManager = new Session_manager();
    $verificator = new Verificator();
    $usersManager = new Users_manager();

    $errorMsg = array();
    if(!isset($name) || $name==""){
        $errorMsg[] = "Enter your name";
    }
    if(!isset($firstname) || $firstname==""){
        $errorMsg[] = "Enter your firstname";
    }
    if(!isset($password) || $password==""){
        $errorMsg[] = "Enter your password";
    }
    if(strlen($password) < 6){
        $errorMsg[] = "Password too short -> Minimum 6 character";
    }
    if(!isset($email) || $email==""){
        $errorMsg[] = "Enter your email";
    }
    if($verificator->checkEmail($email)){
        $errorMsg[] = "The format of this email is incorrect";
    }
    if($usersManager->emailExist($email)){
        $errorMsg[] = "This email already exist";
    }
    if(count($errorMsg)>0){
        $msg = implode("<br/>", $errorMsg);
        $sessionManager->errorMessage = $msg;
        header("Location: /page/signUp/");
        die();
    }
    else{

        $_POST['password'] = password_hash($password, PASSWORD_BCRYPT);
        $random = substr(sha256(rand()), 0, 32);
        $_POST['u_key'] = $random;

        $user = new users_entity();
        $user->hydrate($_POST);
        $ret = $usersManager->insert($user);

        if ($ret) {

          $link = 'http://www.frameworck.me/connexion/validation/?ukey='.$random;

          $to = $email;
          $subject = "Validation account";
          $headers = "Content-type: text/html; charset=UTF-8";
          $message =
          '

          ---------------

          Thank you for registering on the site
          To validate your tracked account is link: <a href="'.$link.'">'.$link.'</a>

          ---------------

          This is an automatic email, please do not reply
          ';

          $ret = mail($to, $subject, $message, $headers);

          $sessionManager->infoMessage = "Your registration performed </br>
          You should receive an email within a few minutes for confirmed";
        }
        else {
          $sessionManager->errorMessage = "Error in your base registration";
        }
        header("Location: /page/index/");
      }
    }

}
