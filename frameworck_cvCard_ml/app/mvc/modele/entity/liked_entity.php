<?php

class Liked_entity {

  protected $id;
  protected $id_liked;
  protected $user;
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

  function getId_liked() {
      return $this->id_liked;
  }

  function getUser() {
      return $this->user;
  }

  function getStatus() {
      return $this->status;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setId_liked($id_liked) {
      $this->id_liked = $id_liked;
  }

  function setUser($user) {
      $this->user = $user;
  }

  function setStatus($status) {
      $this->status = $status;
  }

}
