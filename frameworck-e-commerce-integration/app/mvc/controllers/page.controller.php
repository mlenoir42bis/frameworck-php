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
  public function productlist()
  {
  }
  public function productdetails()
  {    
  }
  public function contact()
  {    
  }
  public function signin()
  {    
  }
  public function cart()
  {    
  }
  public function account()
  {    
  }
  public function dashboard()
  {    
  }
  public function error404()
  {    
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
