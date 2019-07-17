<?php
class LikeController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function getPict(){

    $user = 1;
    $ip = new UserIp();
    $ipUser = $ip->getIp();

    $errorMsg = array();
    if(!isset($ipUser) || $ipUser==""){
        $errorMsg[] = "!----! Error !----! ipUser unknown !----!";
    }

    if(count($errorMsg)>0) {
      $ret["pict"] = "thx.png";
      $ret["err"] = true;
      $ret["msg"] = implode("<br/>", $errorMsg);
    }
    else {
      $galleryPictManager = new GalleryPict_manager();
      $galleryPictEntity = new GalleryPict_entity();
      $galleryPictEntity->setUser($ipUser);
      $galleryPictEntity->setAlbum(1);
      $retGallery = $galleryPictManager->getSwipe($galleryPictEntity);
    }

    if (!$retGallery) {
      $ret["pict"] = "thx.png";
      $ret["err"] = true;
      $ret["msg"] = "No picture";
    }else {
      $ret["pict"] = $retGallery;
      $ret["err"] = false;
    }

    header('Content-Type: text/plain');
    echo json_encode($ret);
    die();
  }

  public function setLike(){
    $idLiked = isset($_POST['idliked'])?$_POST['idliked']:null;
    $idLiked = htmlspecialchars($_POST['idliked'], ENT_QUOTES);
    $status = isset($_POST['status'])?$_POST['status']:null;
    $status = htmlspecialchars($_POST['status'], ENT_QUOTES);

    $user = 1;

    $ip = new UserIp();
    $ipUser = $ip->getIp();

    $errorMsg = array();
    $ret = array();
    $errorInsertion = "!----! Error script !----! insertion !----!";
    $errorUserExist =  "!----! Error script !----! user like exist !----!";
    $errorPict = "thx.png";
    $retErr = true;

    if(!isset($idLiked) || $idLiked==""){
        $errorMsg[] = "!----! Error script !----! transmition picture liked !----!";
    }
    if(!isset($status) || $status==""){
        $errorMsg[] = "!----! Error script !----! transmition status !----!";
    }
    if(!isset($ipUser) || $ipUser==""){
        $errorMsg[] = "!----! Error script !----! ipUser unknown !----!";
    }
    if(count($errorMsg)>0) {
        $ret["msg"] = implode("<br/>", $errorMsg);
        $ret["pict"] = "thx.png";
        $ret["err"] = true;
    }
    else {
      $likeManager = new Liked_manager();
      $likeEntity = new Liked_entity();

      $likeEntity->setId_liked($idLiked);
      $likeEntity->setUser($ipUser);
      $likeEntity->setStatus($status);


      $exist = $likeManager->userLikeExist($likeEntity);
      if (!$exist){
          $ret = $likeManager->insert($likeEntity);
          if (!$ret) {
            $ret["pict"] = $errorPict;
            $ret["msg"] = $errorInsertion;
            $ret["err"] = $retErr;
          }
          else {
            $retErr = false;
            $ret["err"] = $retErr;
          }
      }
      else {
        $ret["pict"] = $errorPict;
        $ret["msg"] = $errorUserExist;
        $ret["err"] = $retErr;
      }
    }

    header('Content-type: text/plain');
    echo json_encode($ret);
    die();
  }

}
 ?>
