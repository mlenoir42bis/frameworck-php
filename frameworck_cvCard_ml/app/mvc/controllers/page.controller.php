<?php

class PageController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function index()
  {
  }
  public function blogosphere()
  {
  }
  public function signIn()
  {
    $this->getMsg();
  }
  public function signOut()
  {
    $this->getMsg();
  }
  public function cgv()
  {
    $this->getMsg();
  }

  public function home()
  {
    $this->getMsg();
    $this->checkLaw();
/*
    $data = "Hello home";
    $this->data['msg'] = $data;
*/
  }

  public function proposition()
  {
    $this->getMsg();
    //$this->checkLaw();
/*
    $data = "Hello home";
    $this->data['msg'] = $data;
*/
  }
  public function adminproposition()
  {
    $this->getMsg();
    //$this->checkLaw();

    $proposition_manager = new ProjectCh_manager();
    $this->data['proposition'] = $proposition_manager->get();
/*
    $data = "Hello home";
    $this->data['msg'] = $data;
*/
  }
  public function admingallery()
  {
    $this->getMsg();
    //$this->checkLaw();
    $rootGallery = ROOT . '/webroot/upload/gallery';
    $galllery = new Gallery();
    $this->data['all'] = $galllery->getAll($rootGallery);

  }

  public function test()
  {
    $project = new ProjectCh_manager();
    $this->data['getById'] = $project->getById(40);
  }

/*
----!!  Private function !!----
*/
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
