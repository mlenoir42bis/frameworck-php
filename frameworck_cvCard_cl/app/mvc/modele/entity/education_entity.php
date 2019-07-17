<?php

class Education_entity {

  protected $id;
  protected $lvl;
  protected $obtaining;
  protected $titleEducation;
  protected $descriptionEducation;
  protected $myOrder;

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

  function getLvl() {
      return $this->lvl;
  }

  function getObtaining() {
      return $this->obtaining;
  }

  function getTitleEducation() {
      return $this->titleEducation;
  }

  function getDescriptionEducation() {
      return $this->descriptionEducation;
  }

  function getMyOrder() {
      return $this->myOrder;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setLvl($lvl) {
      $this->lvl = $lvl;
  }

  function setObtaining($obtaining) {
      $this->obtaining = $obtaining;
  }

  function setTitleEducation($titleEducation) {
      $this->titleEducation = $titleEducation;
  }

  function setDescriptionEducation($descriptionEducation) {
      $this->descriptionEducation = $descriptionEducation;
  }

  function setMyOrder($myOrder) {
      $this->myOrder = $myOrder;
  }

}
