<?php

class ProjectCh_entity {

    protected $id;
    protected $name;
    protected $firstname;
    protected $country;
    protected $adress;
    protected $cp;
    protected $lat;
    protected $lng;
    protected $statusLegal;
    protected $denomination;
    protected $presentation;
    protected $typeApp;
    protected $contextProject;
    protected $constraintProject;
    protected $descriptionProject;
    protected $language;
    protected $stat;
    protected $dateEndProjectBool;
    protected $dateEndProject;
    protected $maintenance;
    protected $nameField;
    protected $accomodation;
    protected $technology;
    protected $bdd;
    protected $designBool;
    protected $budget;
    protected $billing;
    protected $answer;
    protected $email;
    protected $tel;
    protected $preference_answer;
    protected $start_preference_answer;
    protected $end_preference_answer;
    protected $quotation;
    protected $registration;
    protected $upgrade;
    
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

    function getFirstname() {
        return $this->firstname;
    }

    function getCountry() {
        return $this->country;
    }

    function getAdress() {
        return $this->adress;
    }

    function getCp() {
        return $this->cp;
    }

    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function getStatusLegal() {
        return $this->statusLegal;
    }

    function getDenomination() {
        return $this->denomination;
    }

    function getPresentation() {
        return $this->presentation;
    }

    function getTypeApp() {
        return $this->typeApp;
    }

    function getContextProject() {
        return $this->contextProject;
    }

    function getConstraintProject() {
        return $this->constraintProject;
    }

    function getDescriptionProject() {
        return $this->descriptionProject;
    }

    function getLanguage() {
        return $this->language;
    }

    function getStat() {
        return $this->stat;
    }

    function getDateEndProjectBool() {
        return $this->dateEndProjectBool;
    }

    function getDateEndProject() {
        return $this->dateEndProject;
    }

    function getMaintenance() {
        return $this->maintenance;
    }

    function getNameField() {
        return $this->nameField;
    }

    function getAccomodation() {
        return $this->accomodation;
    }

    function getTechnology() {
        return $this->technology;
    }

    function getBdd() {
        return $this->bdd;
    }

    function getDesignBool() {
        return $this->designBool;
    }

    function getBudget() {
        return $this->budget;
    }

    function getBilling() {
        return $this->billing;
    }

    function getAnswer() {
        return $this->answer;
    }

    function getEmail() {
        return $this->email;
    }

    function getTel() {
        return $this->tel;
    }

    function getPreference_answer() {
        return $this->preference_answer;
    }

    function getStart_preference_answer() {
        return $this->start_preference_answer;
    }

    function getEnd_preference_answer() {
        return $this->end_preference_answer;
    }

    function getQuotation() {
        return $this->quotation;
    }

    function getRegistration() {
        return $this->registration;
    }

    function getUpgrade() {
        return $this->upgrade;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setAdress($adress) {
        $this->adress = $adress;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

    function setStatusLegal($statusLegal) {
        $this->statusLegal = $statusLegal;
    }

    function setDenomination($denomination) {
        $this->denomination = $denomination;
    }

    function setPresentation($presentation) {
        $this->presentation = $presentation;
    }

    function setTypeApp($typeApp) {
        $this->typeApp = $typeApp;
    }

    function setContextProject($contextProject) {
        $this->contextProject = $contextProject;
    }

    function setConstraintProject($constraintProject) {
        $this->constraintProject = $constraintProject;
    }

    function setDescriptionProject($descriptionProject) {
        $this->descriptionProject = $descriptionProject;
    }

    function setLanguage($language) {
        $this->language = $language;
    }

    function setStat($stat) {
        $this->stat = $stat;
    }

    function setDateEndProjectBool($dateEndProjectBool) {
        $this->dateEndProjectBool = $dateEndProjectBool;
    }

    function setDateEndProject($dateEndProject) {
        $this->dateEndProject = $dateEndProject;
    }

    function setMaintenance($maintenance) {
        $this->maintenance = $maintenance;
    }
    
    function setNameField($nameField) {
        $this->nameField = $nameField;
    }

    function setAccomodation($accomodation) {
        $this->accomodation = $accomodation;
    }

    function setTechnology($technology) {
        $this->technology = $technology;
    }

    function setBdd($bdd) {
        $this->bdd = $bdd;
    }

    function setDesignBool($designBool) {
        $this->designBool = $designBool;
    }

    function setBudget($budget) {
        $this->budget = $budget;
    }

    function setBilling($billing) {
        $this->billing = $billing;
    }

    function setAnswer($answer) {
        $this->answer = $answer;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setPreference_answer($preference_answer) {
        $this->preference_answer = $preference_answer;
    }

    function setStart_preference_answer($start_preference_answer) {
        $this->start_preference_answer = $start_preference_answer;
    }

    function setEnd_preference_answer($end_preference_answer) {
        $this->end_preference_answer = $end_preference_answer;
    }

    function setQuotation($quotation) {
        $this->quotation = $quotation;
    }

    function setRegistration($registration) {
        $this->registration = $registration;
    }

    function setUpgrade($upgrade) {
        $this->upgrade = $upgrade;
    }
    
}
