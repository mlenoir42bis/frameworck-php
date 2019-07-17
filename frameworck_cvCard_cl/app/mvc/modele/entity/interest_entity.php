<?php

class Interest_entity {

  protected $id;
  protected $content;

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

  function getContent() {
      return $this->content;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setContent($content) {
      $this->content = $content;
  }

}
