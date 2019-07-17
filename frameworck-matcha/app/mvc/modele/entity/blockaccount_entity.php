<?php

class Blockaccount_entity {

  protected $id;
  protected $id_blocked;
  protected $id_blocker;

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

  function getId_blocked() {
      return $this->id_blocked;
  }

  function getId_blocker() {
      return $this->id_blocker;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setId_blocked($id_blocked) {
      $this->id_blocked = $id_blocked;
  }

  function setId_blocker($id_blocker) {
      $this->id_blocker = $id_blocker;
  }

}
