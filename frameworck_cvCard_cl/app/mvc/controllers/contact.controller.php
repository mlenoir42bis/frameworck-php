<?php

class ContactController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function update()
  {
    $description = isset($_POST['description'])?$_POST['description']:null;

    $_POST['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $_POST['descriptionOffice'] = htmlspecialchars($_POST['descriptionOffice'], ENT_QUOTES);
    $_POST['descriptionWork'] = htmlspecialchars($_POST['descriptionWork'], ENT_QUOTES);
    $_POST['officeNumber'] = htmlspecialchars($_POST['officeNumber'], ENT_QUOTES);
    $_POST['labNumber'] = htmlspecialchars($_POST['labNumber'], ENT_QUOTES);
    $_POST['firstEmail'] = htmlspecialchars($_POST['firstEmail'], ENT_QUOTES);
    $_POST['secondEmail'] = htmlspecialchars($_POST['secondEmail'], ENT_QUOTES);
    $_POST['skype'] = htmlspecialchars($_POST['skype'], ENT_QUOTES);
    $_POST['twitter'] = htmlspecialchars($_POST['twitter'], ENT_QUOTES);
    $_POST['linkedin'] = htmlspecialchars($_POST['linkedin'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($description) || $description==""){
        $errorMsg[] = "Description is required";
    }
    if(count($errorMsg)>0){
        $ret = implode("<br />", $errorMsg);
    }
    else {
      $contactManager = new Contact_manager();
      $contactEntity = new Contact_entity();
      $contactEntity->hydrate($_POST);
      $contactEntity->setId(1);
      $ret = $contactManager->update($contactEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function get()
  {
    $contactManager = new Contact_manager();
    $ret =  $contactManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
