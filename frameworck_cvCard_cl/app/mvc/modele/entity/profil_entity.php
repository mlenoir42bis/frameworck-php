<?php

class Profil_entity {

  protected $id;
  protected $name;
  protected $profession;
  protected $titleBio;
  protected $bio;
  protected $avatar;
  protected $resume;

  public function hydrate($data){
      foreach($data as $key=>$value){
          $method = "set".ucfirst($key);
          if(method_exists($this, $method)){
              $this->$method($value);
          }
      }
  }

  function getResume() {
      return $this->resume;
  }

  function setResume($resume) {
      $this->resume = $resume;
  }
  
  function getId() {
      return $this->id;
  }

  function getName() {
      return $this->name;
  }

  function getProfession() {
      return $this->profession;
  }

  function getTitleBio() {
      return $this->titleBio;
  }

  function getBio() {
      return $this->bio;
  }

  function getAvatar() {
      return $this->avatar;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setName($name) {
      $this->name = $name;
  }

  function setProfession($profession) {
      $this->profession = $profession;
  }

  function setTitleBio($titleBio) {
      $this->titleBio = $titleBio;
  }

  function setBio($bio) {
      $this->bio = $bio;
  }

  function setAvatar($avatar) {
      $this->avatar = $avatar;
  }

}
