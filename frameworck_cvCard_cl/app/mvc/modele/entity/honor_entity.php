<?php

class Honor_entity {

  protected $id;
  protected $dateObt;
  protected $title;
  protected $description;
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

  function getDateObt() {
      return $this->dateObt;
  }

  function getTitle() {
      return $this->title;
  }

  function getDescription() {
      return $this->description;
  }

  function getMyOrder() {
      return $this->myOrder;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setDateObt($dateObt) {
      $this->dateObt = $dateObt;
  }

  function setTitle($title) {
      $this->title = $title;
  }

  function setDescription($description) {
      $this->description = $description;
  }

  function setMyOrder($myOrder) {
      $this->myOrder = $myOrder;
  }

}
