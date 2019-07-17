<?php

class Experiment_entity {

  protected $id;
  protected $dateStart;
  protected $dateEnd;
  protected $titleExperiment;
  protected $descriptionExperiment;
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

  function getDateStart() {
      return $this->dateStart;
  }

  function getDateEnd() {
      return $this->dateEnd;
  }

  function getTitleExperiment() {
      return $this->titleExperiment;
  }

  function getDescriptionExperiment() {
      return $this->descriptionExperiment;
  }

  function getMyOrder() {
      return $this->myOrder;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setDateStart($dateStart) {
      $this->dateStart = $dateStart;
  }

  function setDateEnd($dateEnd) {
      $this->dateEnd = $dateEnd;
  }

  function setTitleExperiment($titleExperiment) {
      $this->titleExperiment = $titleExperiment;
  }

  function setDescriptionExperiment($descriptionExperiment) {
      $this->descriptionExperiment = $descriptionExperiment;
  }

  function setMyOrder($myOrder) {
      $this->myOrder = $myOrder;
  }
}
