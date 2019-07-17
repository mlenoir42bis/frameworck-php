<?php

class Htag_entity {

  protected $id;
  protected $name;
  protected $id_user;

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

  function getName() {
      return $this->name;
  }

  function getId_user() {
      return $this->id_user;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setName($name) {
      $this->name = $name;
  }

  function setId_user($id_user) {
      $this->id_user = $id_user;
  }

}
