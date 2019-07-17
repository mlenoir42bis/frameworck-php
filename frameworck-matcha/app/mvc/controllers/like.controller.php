<?php
class LikeController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function setLike(){
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $idUser = isset($id)?$id:null;

    $idLiked=isset($_POST['idLiked'])?$_POST['idLiked']:null;
    $status=isset($_POST['status'])?$_POST['status']:null;

    $errorMsg = array();
    if(!isset($idUser) || $idUser==""){
        $errorMsg[] = "id Profil unknown";
    }
    if(!isset($idLiked) || $idLiked==""){
        $errorMsg[] = "Error transmition id user liked";
    }
    if(!isset($status) || $status==""){
        $errorMsg[] = "Error transmition status";
    }

    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {
      $likeManager = new Like_manager();
      $likeEntity = new Like_entity();
      $likeEntity->setId_liked($idLiked);
      $likeEntity->setId_user($idUser);
      $likeEntity->setStatus($status);
      $exist = $likeManager->likeExist($idUser, $idLiked);
      if (!$exist){
        $req = $likeManager->insert($likeEntity);
      }
      else {
        $req = $likeManager->update($likeEntity);
      }
      if (!$req) {
        $ret = false;
      }
      else {
        $ret = $req;
      }
    }

    header('Content-type: text/plain');
    echo json_encode($ret);
  }

}
 ?>
