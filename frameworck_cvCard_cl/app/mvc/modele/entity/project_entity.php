<?php

class Project_entity {

  protected $id;
  protected $title;
  protected $description;
  protected $content;
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

  function getTitle() {
      return $this->title;
  }

  function getDescription() {
      return $this->description;
  }

  function getContent() {
      return $this->content;
  }

  function getPic() {
      return $this->pic;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setTitle($title) {
      $this->title = $title;
  }

  function setDescription($description) {
      $this->description = $description;
  }

  function setContent($content) {
      $this->content = $content;
  }

  function setPic($pic) {
      $this->pic = $pic;
  }
  
}
