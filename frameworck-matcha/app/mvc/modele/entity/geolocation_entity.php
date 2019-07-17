<?php

class Geolocation_entity {

  protected $id;
  protected $country;
  protected $state;
  protected $city;
  protected $postal;
  protected $adresse;
  protected $lat;
  protected $lng;
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

  function getCountry() {
      return $this->country;
  }

  function getState() {
      return $this->state;
  }

  function getCity() {
      return $this->city;
  }

  function getPostal() {
      return $this->postal;
  }

  function getAdresse() {
      return $this->adresse;
  }

  function getLat() {
      return $this->lat;
  }

  function getLng() {
      return $this->lng;
  }

  function getId_user() {
      return $this->id_user;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setCountry($country) {
      $this->country = $country;
  }

  function setState($state) {
      $this->state = $state;
  }

  function setCity($city) {
      $this->city = $city;
  }

  function setPostal($postal) {
      $this->postal = $postal;
  }

  function setAdresse($adresse) {
      $this->adresse = $adresse;
  }

  function setLat($lat) {
      $this->lat = $lat;
  }

  function setLng($lng) {
      $this->lng = $lng;
  }

  function setId_user($id_user) {
      $this->id_user = $id_user;
  }

}
