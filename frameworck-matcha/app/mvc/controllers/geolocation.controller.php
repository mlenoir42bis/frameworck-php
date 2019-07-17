<?php

class GeolocationController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function getGeolocation(){
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idProfil = isset($id)?$id:null;

    $err = false;
    if (!$idProfil) {
      $output["err"] = "Unknown id profil (Error script)";
      $err = true;
    }
    else {
      $geoManager = new Geolocation_manager();
      $output["data"] = $geoManager->getByIdUser($idProfil);
      $output["err"] = false;
    }

    if ($err){
      header('HTTP/1.1 500 Internal Server Error');
      header( 'Content-Type: application/json; charset=utf-8' );
    }
    else {
      header('Content-type: text/plain');
    }
    echo json_encode($output);
  }
  public function setGeolocation(){
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $email = $sessionManager->email;

    $id = isset($id)?$id:null;
    $data = isset($_POST['data'])?$_POST['data']:null;

    $err = false;
    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Unknown id profil (Error script)";
    }
    if(count($data)<=0){
        $errorMsg[] = "Unknown data (Error script)";
    }
    if(!isset($data['lat']) || $data['lat']==""){
        $errorMsg[] = "Unknown latitude";
    }
    if(!isset($data['lng']) || $data['lng']==""){
        $errorMsg[] = "Unknown longitude";
    }
    if(count($errorMsg)>0) {
        $output = implode("<br/>", $errorMsg);
        $err = true;
    }
    else {
      $geoManager = new Geolocation_manager();
      $geoEntity = new Geolocation_entity();
      $geoEntity->hydrate($data);
      $geoEntity->setId_user($id);

      $exist = $geoManager->existByIdUser($id);
      if ($exist) {
          $output = $geoManager->updateByIdUser($geoEntity);
      }else {
          $output = $geoManager->insert($geoEntity);
      }
    }

    if ($err){
      header('HTTP/1.1 500 Internal Server Error');
      header( 'Content-Type: application/json; charset=utf-8' );
    }
    else {
      header('Content-type: text/plain');
    }
    echo json_encode($output);
  }
}

 ?>
