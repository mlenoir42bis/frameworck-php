<?php

class ResearchController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function description()
  {
    $description=isset($_POST['description'])?$_POST['description']:null;

    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);

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
      $ret = $descriptionManager->update($description, 1);
      if (!$ret) {
        $ret = "Error in update";
      }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function descriptionGet()
  {
    $descriptionManager = new Description_manager();
    $ret = $descriptionManager->get(1);
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getInterest()
  {
    $researchManager = new Research_manager();
    $ret = $researchManager->getInterest();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getInterestById()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    $sessionManager = new session_manager();
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $researchManager = new Research_manager();
      $ret = $researchManager->getInterestById($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function insert()
  {
    $interest=isset($_POST['interest'])?$_POST['interest']:null;

    $interest = htmlspecialchars($_POST['interest'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($interest) || $interest==""){
        $errorMsg[] = "Interest is required";
    }
    $sessionManager = new session_manager();
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $researchManager = new Research_manager();
      $ret = $researchManager->insert($interest);
      if (!$ret) {
        $ret = "Error in update";
      }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function update()
  {
    $interest=isset($_POST['interest'])?$_POST['interest']:null;
    $id=isset($_POST['id'])?$_POST['id']:null;

    $interest = htmlspecialchars($_POST['interest'], ENT_QUOTES);
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($interest) || $interest==""){
        $errorMsg[] = "Interest is required";
    }
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required (Error script)";
    }
    $sessionManager = new session_manager();
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $researchManager = new Research_manager();
      $ret = $researchManager->update($interest, $id);
      if (!$ret) {
        $ret = "Error in update";
      }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    
    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $researchManager = new Research_manager();
      $ret = $researchManager->delete($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
