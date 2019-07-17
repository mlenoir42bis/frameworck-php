<?php

class PostMap_entity {

  protected $id;
  protected $pict;
  protected $subject;
  protected $lat;
  protected $lng;

  public function hydrate($data){
      foreach($data as $key=>$value){
          $method = "set".ucfirst($key);
          if(method_exists($this, $method)){
              $this->$method($value);
          }
      }
  }
  
  function getLat() {
      return $this->lat;
  }

  function getLng() {
      return $this->lng;
  }

  function setLat($lat) {
      $this->lat = $lat;
  }

  function setLng($lng) {
      $this->lng = $lng;
  }

    function getId() {
      return $this->id;
  }

  function getPict() {
      return $this->pict;
  }

  function getSubject() {
      return $this->subject;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setPict($pict) {
      $this->pict = $pict;
  }

  function setSubject($subject) {
      $this->subject = $subject;
  }

}
