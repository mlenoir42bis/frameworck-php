<?php

class ProfilController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function updateProfil()
  {
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;

    $idUser = isset($id)?$id:null;
    $sexe=isset($_POST['sexe'])?$_POST['sexe']:null;
    $orientation=isset($_POST['orientation'])?$_POST['orientation']:null;
    $biographie=isset($_POST['biographie'])?$_POST['biographie']:null;
    $ages=isset($_POST['ages'])?$_POST['ages']:null;
    $sizes=isset($_POST['sizes'])?$_POST['sizes']:null;

    $errorMsg = array();
    if(!isset($idUser) || $idUser==""){
        $errorMsg[] = "id Profil unknown";
    }
    if(!isset($sexe) || $sexe==""){
        $errorMsg[] = "Enter your sexe";
    }
    if(!isset($orientation) || $orientation==""){
        $errorMsg[] = "Enter your orientation sexuel";
    }
    if(!isset($biographie) || $biographie==""){
        $errorMsg[] = "Enter your biographie";
    }
    if(!isset($ages) || $ages==""){
        $errorMsg[] = "Enter your ages";
    }
    if(!isset($sizes) || $sizes==""){
        $errorMsg[] = "Enter your sizes";
    }
    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {
        $tab['sexe'] = $sexe;
        $tab['orientation'] = $orientation;
        $tab['biographie'] = $biographie;
        $tab['id_user'] = $idUser;
        $tab['ages'] = $ages;
        $tab['sizes'] = $sizes;
        $profilEntity = new profil_entity();
        $profilEntity->hydrate($tab);
        $profilManager = new Profil_manager();
        $profilExist = $profilManager->profilExistByIdUser($idUser);
        if ($profilExist) {
          $req = $profilManager->update($profilEntity);
        }
        else {
          $req = $profilManager->insert($profilEntity);
        }
        if (!$req) {
          $ret = "Error in insertion data profil";
        }
        else {
          $ret = true;
        }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}

?>
