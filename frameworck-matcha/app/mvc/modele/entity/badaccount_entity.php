<?php

class Badaccount_entity {

  protected $id;
  protected $id_badAccount;
  protected $id_report;

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

  function getId_badAccount() {
      return $this->id_badAccount;
  }

  function getId_report() {
      return $this->id_report;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setId_badAccount($id_badAccount) {
      $this->id_badAccount = $id_badAccount;
  }

  function setId_report($id_report) {
      $this->id_report = $id_report;
  }
  
}
