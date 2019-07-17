<?php

class EducationController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function insert()
  {
    $lvl=isset($_POST['lvl'])?$_POST['lvl']:null;
    $obtaining=isset($_POST['obtaining'])?$_POST['obtaining']:null;
    $titleEducation=isset($_POST['titleEducation'])?$_POST['titleEducation']:null;
    $descriptionEducation=isset($_POST['descriptionEducation'])?$_POST['descriptionEducation']:null;
    $order=isset($_POST['myOrder'])?$_POST['myOrder']:null;

    $errorMsg = array();
    if(!isset($order) || $order==""){
        $errorMsg[] = "Order is required (error script)";
    }
    if(!isset($lvl) || $lvl==""){
        $errorMsg[] = "lvl is required";
    }
    if(!isset($obtaining) || $obtaining==""){
        $errorMsg[] = "Obtaining is required";
    }
    if(!isset($titleEducation) || $titleEducation==""){
        $errorMsg[] = "titleEducation is required";
    }
    if(!isset($descriptionEducation) || $descriptionEducation==""){
        $errorMsg[] = "DescriptionEducation is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $educationManager = new Education_manager();
      $educationEntity = new education_entity();
      $educationEntity->hydrate($_POST);
      $ret = $educationManager->insert($educationEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function update()
  {
    $lvl=isset($_POST['lvl'])?$_POST['lvl']:null;
    $obtaining=isset($_POST['obtaining'])?$_POST['obtaining']:null;
    $titleEducation=isset($_POST['titleEducation'])?$_POST['titleEducation']:null;
    $descriptionEducation=isset($_POST['descriptionEducation'])?$_POST['descriptionEducation']:null;
    $id=isset($_POST['id'])?$_POST['id']:null;

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(!isset($lvl) || $lvl==""){
        $errorMsg[] = "Lvl is required";
    }
    if(!isset($obtaining) || $obtaining==""){
        $errorMsg[] = "Obtaining is required";
    }
    if(!isset($titleEducation) || $titleEducation==""){
        $errorMsg[] = "TitleEducation is required";
    }
    if(!isset($descriptionEducation) || $descriptionEducation==""){
        $errorMsg[] = "DescriptionEducation is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $educationManager = new Education_manager();
      $educationEntity = new education_entity();
      $educationEntity->hydrate($_POST);
      $ret = $educationManager->update($educationEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $educationManager = new Education_manager();
      $ret = $educationManager->delete($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function get()
  {
    $educationManager = new Education_manager();
    $ret = $educationManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getById()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $educationManager = new Education_manager();
      $ret = $educationManager->getById($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function order()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;
    $order=isset($_POST['order'])?$_POST['order']:null;

    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(!isset($order) || $order==""){
        $errorMsg[] = "Order is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $educationManager = new Education_manager();
      $ret = $educationManager->order($order, $id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
