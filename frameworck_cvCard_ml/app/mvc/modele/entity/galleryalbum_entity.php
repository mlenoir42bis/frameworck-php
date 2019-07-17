<?php

class GalleryPict_entity {

  protected $id;
  protected $name;
  protected $user;

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

  function getUser() {
      return $this->user;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setName($name) {
      $this->name = $name;
  }

  function setUser($user) {
      $this->user = $user;
  }

}
