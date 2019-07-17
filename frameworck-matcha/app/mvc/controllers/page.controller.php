<?php

class PageController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function index()
  {
    $this->getMsg();
    $this->isConnected();
  }
  public function signIn()
  {
    $this->getMsg();
  }
  public function signUp()
  {
    $this->getMsg();
  }
  public function home()
  {
    $this->getMsg();
    $this->checkLaw();
    $this->getDataSetting();


    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idProfil = isset($id)?$id:null;
    $email = $sessionManager->email;
    $email = isset($email)?$email:null;

    if ($idProfil) {
      $profilManager = new Profil_manager();
      $output = $profilManager->selectById($idProfil);
      if ($output) {
        $this->data['sexe'] = $output['sexe'];
        $this->data['ages'] = $output['ages'];
        $this->data['sizes'] = $output['sizes'];
        $this->data['orientation'] = $output['orientation'];
        $this->data['biographie'] = $output['biographie'];
      }
      $htagManager = new Htag_manager();
      $this->data['htag'] = $htagManager->getByIdUser($idProfil);
      if ($email) {
        $dropzoneManager = new Dropzone_manager();
        $this->data['file'] = $dropzoneManager->getByIdUser($id);
        $this->data['file']['dir'] = '../../../../webroot/upload/' . $email . '.' . $id . '/';
      }
    }

  }
  public function setting()
  {
    $this->getMsg();
    $this->checkLaw();
    $this->getDataSetting();
  }
  public function chat()
  {
    $this->getMsg();
    $this->checkLaw();
  }
  public function lookFor()
  {
    $this->getMsg();
    $this->checkLaw();
    $this->getDataSetting();

    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idProfil = isset($id)?$id:null;

    if ($idProfil) {
      $usersManager = new Users_manager();
      $profilManager = new Profil_manager();
      $dropManager = new Dropzone_manager();
      $profil = $usersManager->setUserProfilGeoById($idProfil);
      $this->data["noProfil"] = false;
      if ($profil)
      {

        if ($profil['orientation'] == "Heterosexuelle") {
          $orientation = "Heterosexuelle";
          if ($profil['sexe'] == "Mr") {
            $sexe = "Mme";
          }
          else if ($profil['sexe'] == "Mme"){
            $sexe = "Mr";
          }
          else {
            $all = true;
          }
        }
        else if ($profil['orientation'] == "Homosexuelle") {
          $orientation = "Homosexuelle";
          if ($profil['sexe'] == "Mr") {
            $sexe = "Mr";
          }
          else if ($profil['sexe'] == "Mme"){
            $sexe = "Mme";
          }
          else {
            $all = true;
          }
        }
        else {
          $all = true;
        }

        $i = 0;
        $dist = 50;
        while ($i < 25) {
          if ($all) {
            $output = $usersManager->getUserOnPosInDist($idProfil, $profil['lat'], $profil['lng'], $dist);
          }
          else {
            $output = $usersManager->getUserOnPosInDistBySexe($idProfil, $profil['lat'], $profil['lng'], $dist, $sexe, $orientation);
          }
          if (count($output) >= 20) {
            break;
          }
          $dist += 50;
          $i++;
        }

        $ct = count($output);
        if ($ct > 0) {
          $j = 0;
          while ($j < 20 && $output[$j]) {
            $ret[$j]['profil'] = $usersManager->selectByIdJoinProfil($output[$j]);
            $ret[$j]['file'] = $dropManager->getByIdWithEmailUser($output[$j]);
            $j++;
          }
        }

        if (count($ret) <= 0) {
          $this->data['err'] = true;
          $this->data['msg'] = "Oups no profil";
        }
        else {
          $this->data['err'] = false;
          $this->data['listProfil'] = $ret;
        }

      }
      else {
        $this->data["noProfil"] = true;
      }
    }

  }
  public function swipe()
  {
    $this->getMsg();
    $this->checkLaw();
    $this->getDataSetting();
  }
  public function viewsProfil()
  {
    $this->getMsg();
    $this->checkLaw();
    $this->getDataSetting();

    $id = isset($_GET['id'])?$_GET['id']:null;
    if ($id){
      $this->data['err'] = false;
      $this->data['id'] = $id;
      $usersManager = new Users_manager();
      $this->data['user'] = $usersManager->setUserProfilGeoById($id);
      $dropzoneManager = new Dropzone_manager();
      $this->data['file'] = $dropzoneManager->getByIdWithEmailUser($id);
      $htagManager = new Htag_manager();
      $this->data['htag'] = $htagManager->getByIdUser($id);

      $sessionManager = new Session_manager();
      $likeManager = new Like_manager();
      $like = $likeManager->getById($sessionManager->id, $id);
      if ($like){
        if (!$like['status']) {
          $this->data["msgLike"] = '<div class="alert alert-danger error_info_message">This profil is disliked</div>';;
        }
        else {
          $this->data["msgLike"] = '<div class="alert alert-success error_info_message">This profil is Liked</div>';
        }
      }
      $badManager = new Badaccount_manager();
      $badAccountEntity = new Badaccount_entity();
      $badAccountEntity->setId_badAccount($id);
      $badAccountEntity->setId_report($sessionManager->id);
      $bad = $badManager->reportExist($badAccountEntity);
      if ($bad){
        $this->data["msgBadAccount"] = '<div class="alert alert-danger error_info_message">This profile is reported as bad account</div>';;
      }
      $blockManager = new Blockaccount_manager();
      $blockAccountEntity = new Blockaccount_entity();
      $blockAccountEntity->setId_blocked($id);
      $blockAccountEntity->setId_blocker($sessionManager->id);
      $block = $blockManager->blockExist($blockAccountEntity);
      if ($block){
        $this->data["msgBlockAccount"] = '<div class="alert alert-danger error_info_message">This profile is blocked</div>';;
      }
    }
    else {
      $this->data['err'] = true;
    }
  }

  private function getDataSetting(){
    $sessionManager = new session_manager();
    $id = $sessionManager->id;
    $idUser = isset($id)?$id:null;

    if (!$idUser) {
      $sessionManager->errorMessage = "Unknown id profil (Error script)";
      $this->getMsg();
    }
    else {
      $usersManager = new Users_manager();
      $output = $usersManager->selectById($idUser);
      if ($output) {
        $this->data['name'] = $output['name'];
        $this->data['firstname'] = $output['firstname'];
        $this->data['email'] = $output['email'];
      }
    }
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
