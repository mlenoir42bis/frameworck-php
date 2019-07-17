<?php

class Contact_entity {

  protected $id;
  protected $description;
  protected $officeNumber;
  protected $labNumber;
  protected $firstEmail;
  protected $secondEmail;
  protected $skype;
  protected $twitter;
  protected $linkedin;
  protected $descriptionOffice;
  protected $descriptionWork;

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

  function getDescription() {
      return $this->description;
  }

  function getOfficeNumber() {
      return $this->officeNumber;
  }

  function getLabNumber() {
      return $this->labNumber;
  }

  function getFirstEmail() {
      return $this->firstEmail;
  }

  function getSecondEmail() {
      return $this->secondEmail;
  }

  function getSkype() {
      return $this->skype;
  }

  function getTwitter() {
      return $this->twitter;
  }

  function getLinkedin() {
      return $this->linkedin;
  }

  function getDescriptionOffice() {
      return $this->descriptionOffice;
  }

  function getDescriptionWork() {
      return $this->descriptionWork;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setDescription($description) {
      $this->description = $description;
  }

  function setOfficeNumber($officeNumber) {
      $this->officeNumber = $officeNumber;
  }

  function setLabNumber($labNumber) {
      $this->labNumber = $labNumber;
  }

  function setFirstEmail($firstEmail) {
      $this->firstEmail = $firstEmail;
  }

  function setSecondEmail($secondEmail) {
      $this->secondEmail = $secondEmail;
  }

  function setSkype($skype) {
      $this->skype = $skype;
  }

  function setTwitter($twitter) {
      $this->twitter = $twitter;
  }

  function setLinkedin($linkedin) {
      $this->linkedin = $linkedin;
  }

  function setDescriptionOffice($descriptionOffice) {
      $this->descriptionOffice = $descriptionOffice;
  }

  function setDescriptionWork($descriptionWork) {
      $this->descriptionWork = $descriptionWork;
  }
  
}
