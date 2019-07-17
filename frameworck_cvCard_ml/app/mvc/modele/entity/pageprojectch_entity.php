<?php

class PageProjectCh_entity {

    protected $id;
    protected $namePage;
    protected $descriptionPage;
    protected $contentStaticPage;
    protected $contentDynamicPage;
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

    function getNamePage() {
        return $this->namePage;
    }

    function getDescriptionPage() {
        return $this->descriptionPage;
    }

    function getContentStaticPage() {
        return $this->contentStaticPage;
    }

    function getContentDynamicPage() {
        return $this->contentDynamicPage;
    }

    function getId_parent() {
        return $this->id_parent;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNamePage($namePage) {
        $this->namePage = $namePage;
    }

    function setDescriptionPage($descriptionPage) {
        $this->descriptionPage = $descriptionPage;
    }

    function setContentStaticPage($contentStaticPage) {
        $this->contentStaticPage = $contentStaticPage;
    }

    function setContentDynamicPage($contentDynamicPage) {
        $this->contentDynamicPage = $contentDynamicPage;
    }

    function setId_parent($id_parent) {
        $this->id_parent = $id_parent;
    }
    
}
