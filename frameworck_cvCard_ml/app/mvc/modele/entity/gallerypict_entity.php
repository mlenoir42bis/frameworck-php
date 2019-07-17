<?php

class GalleryPict_entity {

  protected $id;
  protected $pict;
  protected $album;
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

  function getPict() {
      return $this->pict;
  }

  function getAlbum() {
      return $this->album;
  }

  function getUser() {
      return $this->user;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setPict($pict) {
      $this->pict = $pict;
  }

  function setAlbum($album) {
      $this->album = $album;
  }

  function setUser($user) {
      $this->user = $user;
  }
  
}
