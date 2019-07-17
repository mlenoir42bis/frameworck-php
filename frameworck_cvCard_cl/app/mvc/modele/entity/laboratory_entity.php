<?php

class Laboratory_entity {

  protected $id;
  protected $name;
  protected $fonction;
  protected $pic;

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

  function getFonction() {
      return $this->fonction;
  }

  function getPic() {
      return $this->pic;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setName($name) {
      $this->name = $name;
  }

  function setFonction($fonction) {
      $this->fonction = $fonction;
  }

  function setPic($pic) {
      $this->pic = $pic;
  }

}

?>
