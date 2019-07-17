<?php

class ChatController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function getInfo()
  {
    $sessionManager = new Session_manager();
    $output['infoUser'] = true;
    $output['id'] = $sessionManager->id;
    $output['name'] = $sessionManager->name;
    $output['firstname'] = $sessionManager->firstname;
    echo json_encode($output);
  }
}
