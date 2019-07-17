<?php

class Gallery_entity {

  protected $id;
  protected $picture;

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

  function getPicture() {
      return $this->picture;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setPicture($picture) {
      $this->picture = $picture;
  }
  
}
