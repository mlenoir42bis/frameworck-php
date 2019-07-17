<?php
class SwipeController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function getSwipe(){

    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $email = $sessionManager->email;

    $id = isset($id)?$id:null;
    $lat = isset($_POST['lat'])?$_POST['lat']:null;
    $lng = isset($_POST['lng'])?$_POST['lng']:null;
    $email = isset($email)?$email:null;

    $err = false;
    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "Unknown id profil (Error script)";
    }
    if(!isset($lat) || $lat==""){
        $errorMsg[] = "Unknown latitude (Error script)";
    }
    if(!isset($lng) || $lng==""){
        $errorMsg[] = "Unknown longitude (Error script)";
    }
    if(!isset($email) || $email==""){
        $errorMsg[] = "Unknown email (Error script)";
    }

    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
        $err = true;
    }
    else {
      $likeManager = new Like_manager();
      $dropManager = new Dropzone_manager();
      $profilManager = new Profil_manager();

      $sexe = "";
      $orientation = "";
      $all = false;
      $profil = $profilManager->selectById($id);
      if ($profil) {
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
      }
      else {
        $all = true;
      }

      $i = 0;
      $dist = 50;
      while ($i < 25) {
        if ($all) {
          $outputLike = $likeManager->getUserNotLikedOnPosInDist($id, $lat, $lng, $dist);
        }
        else {
          $outputLike = $likeManager->getUserNotLikedOnPosInDistBySexe($id, $lat, $lng, $dist, $sexe, $orientation);
        }
        $ct = count($outputLike);
        if ($ct > 0) {
          $end = false;
          $j = 0;
          while ($j < $ct) {
            $outputDrop = $dropManager->getByIdWithEmailUser($outputLike[$j]);
            if ($outputDrop != false && count($outputDrop) > 0) {
              $ret['err'] = false;
              $ret['data'] = $outputDrop;
              $end = true;
              break;
            }
            $j++;
          }
          if ($end){
            break;
          }
        }
        $dist += 50;
        $i++;
      }

      if (count($ret) <= 0) {
        $ret['err'] = true;
        $ret['msg'] = "Oups no more profil";
      }
    }

    if ($err){
      header('HTTP/1.1 500 Internal Server Error');
      header( 'Content-Type: application/json; charset=utf-8' );
    }
    else {
      header('Content-type: text/plain');
    }
    echo json_encode($ret);
  }
}
