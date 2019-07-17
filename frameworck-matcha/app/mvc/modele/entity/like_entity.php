<?php

class Like_entity {

  protected $id;
  protected $id_liked;
  protected $id_user;
  protected $status;

  public function hydrate($data){
      foreach($data as $key=>$value){
          $method = "set".ucfirst($key);
          if(method_exists($this, $method)){
              $this->$method($value);
          }
      }
  }

  function getStatus() {
      return $this->status;
  }

  function setStatus($status) {
      $this->status = $status;
  }

    function getId() {
      return $this->id;
  }

  function getId_liked() {
      return $this->id_liked;
  }

  function getId_user() {
      return $this->id_user;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setId_liked($id_liked) {
      $this->id_liked = $id_liked;
  }

  function setId_user($id_user) {
      $this->id_user = $id_user;
  }

}
