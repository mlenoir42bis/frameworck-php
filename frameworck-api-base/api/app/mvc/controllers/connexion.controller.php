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

    $security = new Security();

    $email = $security->bdd(htmlentities($email));
    $password = $security->bdd(htmlentities($password));

    $verificator = new Verificator();
    $usersManager = new Users_manager();

    $errorMsg = array();
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
        $ret['err'] = true;
        $ret['msg'] = $msg;
    }
    else {
        if($usersManager->validation($email, $password)){
            $ret['err'] = false;
            $ret['msg'] = 'Welcome';
        }
        else{
            $ret['err'] = true;
            $ret['msg'] = "Authentification error ...";
        }
    }
    header('Content-Type: text/plain');
    echo json_encode($ret);
    die();
  }

}
