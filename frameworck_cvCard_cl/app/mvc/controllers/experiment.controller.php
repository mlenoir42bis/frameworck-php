<?php

class ExperimentController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function insert()
  {
    $dateStart=isset($_POST['dateStart'])?$_POST['dateStart']:null;
    $dateEnd=isset($_POST['dateEnd'])?$_POST['dateEnd']:null;
    $titleExperiment=isset($_POST['titleExperiment'])?$_POST['titleExperiment']:null;
    $descriptionExperiment=isset($_POST['descriptionExperiment'])?$_POST['descriptionExperiment']:null;
    $order=isset($_POST['myOrder'])?$_POST['myOrder']:null;

    $errorMsg = array();
    if(!isset($order) || $order==""){
        $errorMsg[] = "Order is required (error script)";
    }
    if(!isset($dateStart) || $dateStart==""){
        $errorMsg[] = "DateStart is required";
    }
    if(!isset($dateEnd) || $dateEnd==""){
        $errorMsg[] = "DateEnd is required";
    }
    if(!isset($titleExperiment) || $titleExperiment==""){
        $errorMsg[] = "TitleExperiment is required";
    }
    if(!isset($descriptionExperiment) || $descriptionExperiment==""){
        $errorMsg[] = "DescriptionExperiment is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $experimentManager = new Experiment_manager();
      $experimentEntity = new Experiment_entity();
      $experimentEntity->hydrate($_POST);
      $ret = $experimentManager->insert($experimentEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function update()
  {
    $dateStart=isset($_POST['dateStart'])?$_POST['dateStart']:null;
    $dateEnd=isset($_POST['dateEnd'])?$_POST['dateEnd']:null;
    $titleExperiment=isset($_POST['titleExperiment'])?$_POST['titleExperiment']:null;
    $descriptionExperiment=isset($_POST['descriptionExperiment'])?$_POST['descriptionExperiment']:null;
    $id=isset($_POST['id'])?$_POST['id']:null;

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(!isset($dateStart) || $dateStart==""){
        $errorMsg[] = "DateStart is required";
    }
    if(!isset($dateEnd) || $dateEnd==""){
        $errorMsg[] = "DateEnd is required";
    }
    if(!isset($titleExperiment) || $titleExperiment==""){
        $errorMsg[] = "TitleExperiment is required";
    }
    if(!isset($descriptionExperiment) || $descriptionExperiment==""){
        $errorMsg[] = "DescriptionExperiment is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $experimentManager = new Experiment_manager();
      $experimentEntity = new Experiment_entity();
      $experimentEntity->hydrate($_POST);
      $ret = $experimentManager->update($experimentEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $experimentManager = new Experiment_manager();
      $experimentEntity = new Experiment_entity();
      $ret = $experimentManager->delete($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function order()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;
    $order=isset($_POST['order'])?$_POST['order']:null;

    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(!isset($order) || $order==""){
        $errorMsg[] = "Order is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $experimentManager = new Experiment_manager();
      $ret = $experimentManager->order($order, $id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function get()
  {
    $experimentManager = new Experiment_manager();
    $ret = $experimentManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getById()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $experimentManager = new Experiment_manager();
      $ret = $experimentManager->getById($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
