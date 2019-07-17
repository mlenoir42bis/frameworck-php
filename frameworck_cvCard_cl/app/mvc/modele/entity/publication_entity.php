<?php

class Publication_entity {

  protected $id;
  protected $title;
  protected $author;
  protected $myRelease;
  protected $type;
  protected $file;
  protected $link;
  protected $content;
  protected $dateYear;

  public function hydrate($data){
      foreach($data as $key=>$value){
          $method = "set".ucfirst($key);
          if(method_exists($this, $method)){
              $this->$method($value);
          }
      }
  }

  function getDateYear() {
      return $this->dateYear;
  }

  function setDateYear($dateYear) {
      $this->dateYear = $dateYear;
  }

  function getId() {
      return $this->id;
  }

  function getTitle() {
      return $this->title;
  }

  function getAuthor() {
      return $this->author;
  }

  function getMyRelease() {
      return $this->myRelease;
  }

  function getType() {
      return $this->type;
  }

  function getFile() {
      return $this->file;
  }

  function getLink() {
      return $this->link;
  }

  function getContent() {
      return $this->content;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setTitle($title) {
      $this->title = $title;
  }

  function setAuthor($author) {
      $this->author = $author;
  }

  function setMyRelease($myRelease) {
      $this->myRelease = $myRelease;
  }

  function setType($type) {
      $this->type = $type;
  }

  function setFile($file) {
      $this->file = $file;
  }

  function setLink($link) {
      $this->link = $link;
  }

  function setContent($content) {
      $this->content = $content;
  }

}
