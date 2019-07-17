<?php
class HtagController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function autoComplete()
  {
    $text=isset($_POST['text'])?$_POST['text']:null;

    $errorMsg = array();
    if(!isset($text) || $text==""){
        $errorMsg[] = "text unknown";
    }
    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {
      $htagManager = new Htag_manager();
      $ret = $htagManager->autoComplete($text);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function insert(){
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idUser = isset($id)?$id:null;

    $name=isset($_POST['name'])?$_POST['name']:null;

    $errorMsg = array();
    if(!isset($idUser) || $idUser==""){
        $errorMsg[] = "id Profil unknown";
    }
    if(!isset($name) || $name==""){
        $errorMsg[] = "Error transmition htag";
    }

    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {
      $htagManager = new Htag_manager();
      $htagEntity = new htag_entity();
      $htagEntity->setName($name);
      $htagEntity->setId_user($idUser);
      $req = $htagManager->insert($htagEntity);
      if (!$req) {
        $ret = false;
      }
      else {
        $ret = $req;
      }
    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete(){

    $name=isset($_POST['name'])?$_POST['name']:null;
    $id=isset($_POST['id'])?$_POST['id']:null;

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id htag uncknow";
    }
    if(!isset($name) || $name==""){
        $errorMsg[] = "Name htag uncknow";
    }

    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {
      $htagManager = new Htag_manager();
      $htagEntity = new htag_entity();
      $htagEntity->setName($name);
      $htagEntity->setId($id);
      $req = $htagManager->delete($htagEntity);
      if (!$req) {
        $ret = "Error in delete";
      }
      else {
        $ret = true;
      }
    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
