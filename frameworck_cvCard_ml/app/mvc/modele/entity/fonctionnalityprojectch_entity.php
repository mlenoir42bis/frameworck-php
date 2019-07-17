<?php

class FonctionnalityProjectCh_entity {

    protected $id;
    protected $name;
    protected $description;
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

    function getDescription() {
        return $this->description;
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

    function setDescription($description) {
        $this->description = $description;
    }

    function setParentTable($parentTable) {
        $this->parentTable = $parentTable;
    }

    function setId_parent($id_parent) {
        $this->id_parent = $id_parent;
    }
    
}
