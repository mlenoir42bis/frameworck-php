<?php

class Email_entity {

  protected $id;
  protected $myFrom;
  protected $to;
  protected $subject;

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

  function getMyFrom() {
      return $this->myFrom;
  }

  function getTo() {
      return $this->to;
  }

  function getSubject() {
      return $this->subject;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setMyFrom($myFrom) {
      $this->myFrom = $myFrom;
  }

  function setTo($to) {
      $this->to = $to;
  }

  function setSubject($subject) {
      $this->subject = $subject;
  }
  
}
