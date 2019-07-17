<?php
class TeachingController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function description(){
    $description=isset($_POST['description'])?$_POST['description']:null;

    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($description) || $description==""){
        $errorMsg[] = "Description is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $descriptionManager = new description_manager();
      $ret = $descriptionManager->update($description, 4);
      if (!$ret) {
        $ret = "Error in update";
      }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function insertHistory(){
    $dateEnd=isset($_POST['dateEnd'])?$_POST['dateEnd']:null;
    $dateStart=isset($_POST['dateStart'])?$_POST['dateStart']:null;
    $title=isset($_POST['title'])?$_POST['title']:null;
    $content=isset($_POST['content'])?$_POST['content']:null;
    $order=isset($_POST['myOrder'])?$_POST['myOrder']:null;

    $_POST['dateEnd'] = htmlspecialchars($_POST['dateEnd'], ENT_QUOTES);
    $_POST['dateStart'] = htmlspecialchars($_POST['dateStart'], ENT_QUOTES);
    $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);
    $_POST['myOrder'] = htmlspecialchars($_POST['myOrder'], ENT_QUOTES);

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
    if(!isset($title) || $title==""){
        $errorMsg[] = "Title is required";
    }
    if(!isset($content) || $content==""){
        $errorMsg[] = "Content is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $teachingManager = new Teaching_manager();
      $teachingEntity = new Teaching_entity();
      $teachingEntity->hydrate($_POST);
      $teachingEntity->setStatus(0);
      $ret = $teachingManager->insert($teachingEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function insertCurrent(){
    $dateEnd=isset($_POST['dateEnd'])?$_POST['dateEnd']:null;
    $dateStart=isset($_POST['dateStart'])?$_POST['dateStart']:null;
    $title=isset($_POST['title'])?$_POST['title']:null;
    $content=isset($_POST['content'])?$_POST['content']:null;
    $order=isset($_POST['myOrder'])?$_POST['myOrder']:null;

    $_POST['dateEnd'] = htmlspecialchars($_POST['dateEnd'], ENT_QUOTES);
    $_POST['dateStart'] = htmlspecialchars($_POST['dateStart'], ENT_QUOTES);
    $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);
    $_POST['myOrder'] = htmlspecialchars($_POST['myOrder'], ENT_QUOTES);

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
    if(!isset($title) || $title==""){
        $errorMsg[] = "Title is required";
    }
    if(!isset($content) || $content==""){
        $errorMsg[] = "Content is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $teachingManager = new Teaching_manager();
      $teachingEntity = new Teaching_entity();
      $teachingEntity->hydrate($_POST);
      $teachingEntity->setStatus(1);
      $ret = $teachingManager->insert($teachingEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function update(){
    $dateEnd=isset($_POST['dateEnd'])?$_POST['dateEnd']:null;
    $dateStart=isset($_POST['dateStart'])?$_POST['dateStart']:null;
    $title=isset($_POST['title'])?$_POST['title']:null;
    $content=isset($_POST['content'])?$_POST['content']:null;
    $id=isset($_POST['id'])?$_POST['id']:null;

    $_POST['dateEnd'] = htmlspecialchars($_POST['dateEnd'], ENT_QUOTES);
    $_POST['dateStart'] = htmlspecialchars($_POST['dateStart'], ENT_QUOTES);
    $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES);
    $_POST['id'] = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($dateStart) || $dateStart==""){
        $errorMsg[] = "DateStart is required";
    }
    if(!isset($dateEnd) || $dateEnd==""){
        $errorMsg[] = "DateEnd is required";
    }
    if(!isset($title) || $title==""){
        $errorMsg[] = "Title is required";
    }
    if(!isset($content) || $content==""){
        $errorMsg[] = "Content is required";
    }
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $teachingManager = new Teaching_manager();
      $teachingEntity = new Teaching_entity();
      $teachingEntity->hydrate($_POST);
      $ret = $teachingManager->update($teachingEntity);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function delete(){
    $id = isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $teachingManager = new Teaching_manager();
      $ret = $teachingManager->delete($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getHistory(){
    $teachingManager = new Teaching_manager();
    $ret = $teachingManager->get(0);
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getCurrent(){
    $teachingManager = new Teaching_manager();
    $ret = $teachingManager->get(1);
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getById(){
    $id = isset($_POST['id'])?$_POST['id']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Id is required";
    }
    if(count($errorMsg)>0) {
      $ret = implode("<br/>", $errorMsg);
    }
    else {
      $teachingManager = new Teaching_manager();
      $ret = $teachingManager->getById($id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function order()
  {
    $id=isset($_POST['id'])?$_POST['id']:null;
    $order=isset($_POST['order'])?$_POST['order']:null;

    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    $order = htmlspecialchars($_POST['order'], ENT_QUOTES);

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
      $teachingManager = new Teaching_manager();
      $ret = $teachingManager->order($order, $id);
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
