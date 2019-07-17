<?php

class Profil_entity {

  protected $id;
  protected $sexe;
  protected $orientation;
  protected $biographie;
  protected $ages;
  protected $sizes;
  protected $score;
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

  function getSexe() {
      return $this->sexe;
  }

  function getOrientation() {
      return $this->orientation;
  }

  function getBiographie() {
      return $this->biographie;
  }

  function getAges() {
      return $this->ages;
  }

  function getSizes() {
      return $this->sizes;
  }

  function getScore() {
      return $this->score;
  }

  function getId_user() {
      return $this->id_user;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setSexe($sexe) {
      $this->sexe = $sexe;
  }

  function setOrientation($orientation) {
      $this->orientation = $orientation;
  }

  function setBiographie($biographie) {
      $this->biographie = $biographie;
  }

  function setAges($ages) {
      $this->ages = $ages;
  }

  function setSizes($sizes) {
      $this->sizes = $sizes;
  }

  function setScore($score) {
      $this->score = $score;
  }

  function setId_user($id_user) {
      $this->id_user = $id_user;
  }

}
