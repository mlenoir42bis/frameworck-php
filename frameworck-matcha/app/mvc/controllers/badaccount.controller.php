<?php

class BadaccountController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function setReport()
  {
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;

    $idUser = isset($id)?$id:null;
    $idBad = isset($_POST['idBad'])?$_POST['idBad']:null;

    $err = false;
    if (!$idUser) {
      $output[] = "Unknown id profil (Error script)";
      $err = true;
    }
    else if (!$idBad) {
      $output[] = "Unknown id bad account";
      $err = true;
    }
    else {

      $badAccountManager = new Badaccount_manager();
      $badAccountEntity = new Badaccount_entity();
      $badAccountEntity->setId_badAccount($idBad);
      $badAccountEntity->setId_report($idUser);

      $exist = $badAccountManager->reportExist($badAccountEntity);
      if (!$exist) {
       $req = $badAccountManager->insert($badAccountEntity);
      }
    }
    header('Content-type: text/plain');
    echo json_encode($req);
  }

}
