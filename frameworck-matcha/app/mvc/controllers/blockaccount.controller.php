<?php

class BlockaccountController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function setBlock()
  {
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;

    $idUser = isset($id)?$id:null;
    $idBlock = isset($_POST['idBlocked'])?$_POST['idBlocked']:null;

    $err = false;
    if (!$idUser) {
      $output[] = "Unknown id profil (Error script)";
      $err = true;
    }
    else if (!$idBlock) {
      $output[] = "Unknown id bad account";
      $err = true;
    }
    else {

      $blockAccountManager = new Blockaccount_manager();
      $blockAccountEntity = new Blockaccount_entity();
      $blockAccountEntity->setId_blocked($idBlock);
      $blockAccountEntity->setId_blocker($idUser);

      $exist = $blockAccountManager->blockExist($blockAccountEntity);
      if (!$exist) {
       $req = $blockAccountManager->insert($blockAccountEntity);
      }
    }
    header('Content-type: text/plain');
    echo json_encode($req);
  }

}
