<?php

class Users_entity {

  protected $id;
  protected $email;
  protected $password;


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

  function getEmail() {
      return $this->email;
  }

  function getPassword() {
      return $this->password;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setEmail($email) {
      $this->email = $email;
  }

  function setPassword($password) {
      $this->password = $password;
  }
  
}
