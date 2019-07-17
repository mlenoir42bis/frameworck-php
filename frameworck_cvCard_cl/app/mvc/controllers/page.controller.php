<?php

class PageController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function index()
  {
    $profilManager = new Profil_manager();
    $this->data['dataProfil'] = $profilManager->get();
    $experimentManager = new Experiment_manager();
    $this->data['experiment'] = $experimentManager->get();
    $educationManager = new Education_manager();
    $this->data['education'] = $educationManager->get();
    $honorManager = new Honor_manager();
    $this->data['honor'] = $honorManager->get();
    $descriptionManager = new Description_manager();
    $this->data['descriptionResearch'] = $descriptionManager->get(1);
    $researchManager = new Research_manager();
    $this->data['interest'] = $researchManager->getInterest();
    $laboratoryManager = new Laboratory_manager();
    $this->data['laboratory'] = $laboratoryManager->get();
    $ret = $descriptionManager->get(2);
    $this->data['descriptionLaboratory'] = $ret[0]["description"];
    $projectManager = new Project_manager();
    $this->data['project'] = $projectManager->get();
    $this->data['descriptionPublication'] = $descriptionManager->get(3);
    $publicationManager = new Publication_manager();
    $this->data['publication'] = $publicationManager->get();
    $this->data['descriptionTeaching'] = $descriptionManager->get(4);
    $teachingManager = new Teaching_manager();
    $this->data['teachingHistory'] = $teachingManager->get(0);
    $this->data['teachingCurrent'] = $teachingManager->get(1);
    $galleryManager = new Gallery_manager();
    $this->data['gallery'] = $galleryManager->get();
    $contactManager = new Contact_manager();
    $this->data['contact'] =  $contactManager->get();
  }
  public function signIn()
  {
    $this->getMsg();
  }
  public function gallery()
  {
    $this->getMsg();
    $this->checkLaw();
    $galleryManager = new Gallery_manager();
    $this->data['gallery'] = $galleryManager->get();
  }
  public function contact()
  {
    $this->getMsg();
    $this->checkLaw();
    $contactManager = new Contact_manager();
    $this->data['contact'] =  $contactManager->get();
  }
  public function teachingHistory()
  {
    $this->getMsg();
    $this->checkLaw();
    $descriptionManager = new Description_manager();
    $this->data['descriptionTeaching'] = $descriptionManager->get(4);
    $teachingManager = new Teaching_manager();
    $this->data['teaching'] = $teachingManager->get(0);
  }
  public function teachingCurrent()
  {
    $this->getMsg();
    $this->checkLaw();
    $teachingManager = new Teaching_manager();
    $this->data['teaching'] = $teachingManager->get(1);
  }
  public function signOut()
  {
    $this->getMsg();
  }
  public function publication()
  {
    $this->getMsg();
    $this->checkLaw();
    $descriptionManager = new Description_manager();
    $this->data['descriptionPublication'] = $descriptionManager->get(3);
    $publicationManager = new Publication_manager();
    $this->data['publication'] = $publicationManager->get();
  }
  public function research()
  {
    $this->getMsg();
    $this->checkLaw();
    $researchManager = new Research_manager();
    $this->data['interest'] = $researchManager->getInterest();
    $descriptionManager = new Description_manager();
    $ret = $descriptionManager->get(1);
    $this->data['descriptionResearch'] = $ret[0]["description"];
  }
  public function laboratory()
  {
    $this->getMsg();
    $this->checkLaw();
    $laboratoryManager = new Laboratory_manager();
    $this->data['laboratoryMember'] = $laboratoryManager->get();
    $descriptionManager = new Description_manager();
    $ret = $descriptionManager->get(2);
    $this->data['descriptionLaboratory'] = $ret[0]["description"];
  }
  public function project()
  {
    $this->getMsg();
    $this->checkLaw();
    $projectManager = new Project_manager();
    $this->data['project'] = $projectManager->get();
  }
  public function experiment()
  {
    $this->getMsg();
    $this->checkLaw();
    $experimentManager = new Experiment_manager();
    $this->data['experiment'] = $experimentManager->get();
  }
  public function education()
  {
    $this->getMsg();
    $this->checkLaw();
    $educationManager = new Education_manager();
    $this->data['education'] = $educationManager->get();
  }
  public function honor()
  {
    $this->getMsg();
    $this->checkLaw();
    $honorManager = new Honor_manager();
    $this->data['honor'] = $honorManager->get();
  }
  public function home()
  {
    $this->getMsg();
    $this->checkLaw();
    $profilManager = new Profil_manager();
    $this->data['dataProfil'] = $profilManager->get();
  }
  private function getMsg() {
    $msg = new displayMessage();
    $this->data["msg"] = $msg->create();
  }
  private function isConnected() {
    $checkLaw = new sessionCheck();
    $this->data["isConnected"] = $checkLaw->isConnected();
  }
  private function checkLaw() {
    $checkLaw = new sessionCheck();
    $checkLaw->isNotConnectedRedirect();
    $this->isConnected();
  }
}
