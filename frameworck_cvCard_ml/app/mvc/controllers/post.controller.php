<?php

class PostController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function postMap()
  {
    $verificator = new verificator();

    $subjectPost = isset($_POST['subjectPost'])?$_POST['subjectPost']:null;
    $subjectPost = htmlspecialchars($_POST['subjectPost'], ENT_QUOTES);

    $latPost = isset($_POST['lat'])?$_POST['lat']:null;
    $latPost = htmlspecialchars($_POST['lat'], ENT_QUOTES);

    $lngPost = isset($_POST['lng'])?$_POST['lng']:null;
    $lngPost = htmlspecialchars($_POST['lng'], ENT_QUOTES);

    $captcha = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:null;

    $errorMsg = array();
    $ret = array();
    if($_FILES['file']['error'] == 4){
        $errorMsg[] = "file is required";
    }
    if(!isset($subjectPost) || $subjectPost==""){
        $errorMsg[] = "Your subject is required";
    }
    if(!isset($latPost) || $latPost==""){
        $errorMsg[] = "Latitude is require (Error script)";
    }
    if(!isset($lngPost) || $lngPost==""){
        $errorMsg[] = "Longitude is require (Error script)";
    }
    if(!isset($captcha) || $captcha==""){
        $errorMsg[] = "Captcha is not defined, apparently you are a robot";
    }
    $verifCaptcha = $verificator->checkCaptcha($captcha);
    if (!$verifCaptcha) {
        $errorMsg[] = "Captcha is not defined, apparently you are a robot";
    }
    if(count($errorMsg)>0) {
      $ret["msg"] = implode("<br/>", $errorMsg);
      $ret["err"] = true;
    }
    else {
      $image = $_FILES['file']['name'];
      $extension = substr($image, strrpos($image, '.') + 1);
      $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
      $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

      $rootUpload = ROOT . '/webroot/upload/postMap/';
      if(!is_dir($rootUpload)) {
        mkdir(($rootUpload), 0777, true);
      }

      $upload = new Upload();
      $arrayExtension = ['jpg', 'png', 'jpeg'];
      $ret = $upload->uploadSimpl($_FILES, 'file', $rootUpload, 10000000, $arrayExtension);

      if ($ret['err'] == false) {

        if (file_exists($rootUpload . $image)) {
          $basename = basename($image, $extension);
          $random = substr(sha1(rand()), 0, 5);
          $new_name = $basename . $random . '.' . $extension;
          rename($rootUpload . $image, $rootUpload . $new_name);
        }

        $PostMapManager = new PostMap_manager();
        $PostMapEntity = new PostMap_entity();
        $PostMapEntity->setPict($new_name);
        $PostMapEntity->setSubject($subjectPost);
        $PostMapEntity->setLat($latPost);
        $PostMapEntity->setLng($lngPost);
        $retInsert = $PostMapManager->insert($PostMapEntity);
        if ($retInsert != false) {
          $ret["img"] = $new_name;
          $ret["msg"] = true;
          $ret["err"] = false;
          $ret["id"] = $retInsert;
          $ret["subject"] = $subjectPost;
        }
        else {
          $ret["msg"] = "Error in insertion";
          $ret["err"] = true;
        }
      }
      else {
        $ret["err"] = true;
      }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function getPostMap()
  {
    $PostMapManager = new PostMap_manager();
    $ret = $PostMapManager->get();
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
  public function sendEmail()
  {
    $verificator = new verificator();

    $subject = isset($_POST['subject'])?$_POST['subject']:null;
    $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES);

    $from = isset($_POST['myFrom'])?$_POST['myFrom']:null;
    $from = htmlspecialchars($_POST['myFrom'], ENT_QUOTES);

    $captcha = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:null;

    $errorMsg = array();
    if(!isset($subject) || $subject==""){
        $errorMsg[] = "Your subject is required";
    }
    if(!isset($from) || $from==""){
        $errorMsg[] = "Your email is required";
    }
    if($verificator->checkEmail($from)){
        $errorMsg[] = "The format of email is incorrect";
    }
    if(!isset($captcha) || $captcha==""){
        $errorMsg[] = "Captcha is not defined, apparently you are a robot";
    }

    if(count($errorMsg)>0) {
      $ret["msg"] = implode("<br/>", $errorMsg);
      $ret["err"] = true;
    }
    else {
      $verifCaptcha = $verificator->checkCaptcha($captcha);

      if ($verifCaptcha) {

          $mail = 'marceau.lenoir@gmail.com';
          
          if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
          	$passage_ligne = "\r\n";
          }
          else{
          	$passage_ligne = "\n";
          }

          $sujet = "Contact ML";
          $message_html = "<html><head></head><body> mail : " . $from . "<br/><br/>" . $subject . "</body></html>";

          $boundary = "-----=".md5(rand());

          $header = "From: \"M.L\"<" . $mail . ">" . $passage_ligne;
          $header.= "Reply-to: \"M.L\"<" . $mail . ">" . $passage_ligne;
          $header.= "MIME-Version: 1.0". $passage_ligne;
          $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

          $message.= $passage_ligne."--".$boundary.$passage_ligne;

          $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
          $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
          $message.= $passage_ligne.$message_html.$passage_ligne;

          $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
          $message.= $passage_ligne."--".$boundary."--".$passage_ligne;

          if (mail($mail,$sujet,$message,$header)) {
              $ret["msg"] = "Success";
              $ret["err"] = false;
          }
          else {
              $ret["msg"] = "Error";
              $ret["err"] = true;
          }
          

      }
      else {
        $ret["msg"] = "Captcha on error, apparently you are a robot";
        $ret["err"] = true;
      }

    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }
}
