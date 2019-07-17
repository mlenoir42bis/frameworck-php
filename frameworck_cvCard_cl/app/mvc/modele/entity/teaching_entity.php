<?php

class Teaching_entity {

  protected $id;
  protected $title;
  protected $content;
  protected $dateStart;
  protected $dateEnd;
  protected $status;
  protected $myOrder;

  public function hydrate($data){
      foreach($data as $key=>$value){
          $method = "set".ucfirst($key);
          if(method_exists($this, $method)){
              $this->$method($value);
          }
      }
  }

  function getId() {
      return $this->id;
  }

  function getTitle() {
      return $this->title;
  }

  function getContent() {
      return $this->content;
  }

  function getDateStart() {
      return $this->dateStart;
  }

  function getDateEnd() {
      return $this->dateEnd;
  }

  function getStatus() {
      return $this->status;
  }

  function getMyOrder() {
      return $this->myOrder;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setTitle($title) {
      $this->title = $title;
  }

  function setContent($content) {
      $this->content = $content;
  }

  function setDateStart($dateStart) {
      $this->dateStart = $dateStart;
  }

  function setDateEnd($dateEnd) {
      $this->dateEnd = $dateEnd;
  }

  function setStatus($status) {
      $this->status = $status;
  }

  function setMyOrder($myOrder) {
      $this->myOrder = $myOrder;
  }

}
