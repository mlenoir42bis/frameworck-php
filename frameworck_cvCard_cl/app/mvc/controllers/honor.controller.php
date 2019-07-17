<?php

class HonorController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

    public function insert()
    {
      $dateObt = isset($_POST['dateObt'])?$_POST['dateObt']:null;
      $title = isset($_POST['title'])?$_POST['title']:null;
      $desciption = isset($_POST['description'])?$_POST['description']:null;
      $order = isset($_POST['myOrder'])?$_POST['myOrder']:null;

      $errorMsg = array();
      if(!isset($order) || $order==""){
          $errorMsg[] = "Order is required (error script)";
      }
      if(!isset($dateObt) || $dateObt==""){
          $errorMsg[] = "DateObt is required";
      }
      if(!isset($title) || $title==""){
          $errorMsg[] = "Title is required";
      }
      if(!isset($desciption) || $desciption==""){
          $errorMsg[] = "Desciption is required";
      }
      if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
      }
      else {
        $honorManager = new Honor_manager();
        $honorEntity = new honor_entity();
        $honorEntity->hydrate($_POST);
        $ret = $honorManager->insert($honorEntity);
      }
      header('Content-type: text/plain');
      echo json_encode($_POST);
    }
    public function update()
    {
      $dateObt = isset($_POST['dateObt'])?$_POST['dateObt']:null;
      $title = isset($_POST['title'])?$_POST['title']:null;
      $desciption = isset($_POST['desciption'])?$_POST['desciption']:null;
      $id = isset($_POST['id'])?$_POST['id']:null;

      $errorMsg = array();
      if(!isset($id) || $id==""){
          $errorMsg[] = "Id is required";
      }
      if(!isset($dateObt) || $dateObt==""){
          $errorMsg[] = "DateObt is required";
      }
      if(!isset($title) || $title==""){
          $errorMsg[] = "Title is required";
      }
      if(!isset($desciption) || $desciption==""){
          $errorMsg[] = "Desciption is required";
      }
      if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
      }
      else {
        $honorManager = new Honor_manager();
        $honorEntity = new honor_entity();
        $honorEntity->hydrate($_POST);
        $ret = $honorManager->update($honorEntity);
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
        $honorManager = new Honor_manager();
        $ret = $honorManager->delete($id);
      }
      header('Content-type: text/plain');
      echo json_encode($ret);
    }
    public function get()
    {
      $honorManager = new Honor_manager();
      $ret = $honorManager->get($id);
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
        $honorManager = new Honor_manager();
        $ret = $honorManager->getById($id);
      }
      header('Content-type: text/plain');
      echo json_encode($ret);
    }
    public function order()
    {
      $id=isset($_POST['id'])?$_POST['id']:null;
      $order=isset($_POST['order'])?$_POST['order']:null;

      $errorMsg = array();
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
        $honorManager = new Honor_manager();
        $ret = $honorManager->order($order, $id);
      }
      header('Content-type: text/plain');
      echo json_encode($ret);
    }
}
