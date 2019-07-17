<?php

class Users_entity {

  protected $id;
  protected $name;
  protected $firstname;
  protected $email;
  protected $password;
  protected $u_key;
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

  function getName() {
      return $this->name;
  }

  function getFirstname() {
      return $this->firstname;
  }

  function getEmail() {
      return $this->email;
  }

  function getPassword() {
      return $this->password;
  }

  function getU_key() {
      return $this->u_key;
  }

  function getStatus() {
      return $this->status;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setName($name) {
      $this->name = $name;
  }

  function setFirstname($firstname) {
      $this->firstname = $firstname;
  }

  function setEmail($email) {
      $this->email = $email;
  }

  function setPassword($password) {
      $this->password = $password;
  }

  function setU_key($u_key) {
      $this->u_key = $u_key;
  }

  function setStatus($status) {
      $this->status = $status;
  }

}
