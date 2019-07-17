<?php

class Description_entity {

  protected $id;
  protected $description;
  protected $status;

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

  function getDescription() {
      return $this->description;
  }

  function getStatus() {
      return $this->status;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setDescription($description) {
      $this->description = $description;
  }

  function setStatus($status) {
      $this->status = $status;
  }

}
