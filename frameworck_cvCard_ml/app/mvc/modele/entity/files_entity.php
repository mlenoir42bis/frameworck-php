<?php

class Files_entity {

    protected $id;
    protected $name;
    protected $location;
    protected $type;
    protected $tag;
    protected $parentTable;
    protected $id_parent;

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

    function getLocation() {
        return $this->location;
    }

    function getType() {
        return $this->type;
    }

    function getTag() {
        return $this->tag;
    }

    function getParentTable() {
        return $this->parentTable;
    }

    function getId_parent() {
        return $this->id_parent;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setTag($tag) {
        $this->tag = $tag;
    }

    function setParentTable($parentTable) {
        $this->parentTable = $parentTable;
    }

    function setId_parent($id_parent) {
        $this->id_parent = $id_parent;
    }
  
}
