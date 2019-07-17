<?php

class AvatarController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function getAvatar()
  {
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;
    $email = $sessionManager->email;

    $id = isset($id)?$id:null;
    $email = isset($email)?$email:null;

    $err = false;
    if (!$id) {
      $output[] = "Unknown id profil (Error script)";
      $err = true;
    }
    else if (!$email) {
      $output[] = "Unknown email profil (Error script)";
      $err = true;
    }
    else {
      $dropzoneManager = new Dropzone_manager();
      $output = $dropzoneManager->getByIdUserStatus($id, 1);
      if (count($output) != 0) {
        $output['any'] = false;
      }
      else {
        $output['any'] = true;
      }
      $output['dir'] = $rootUploadUser = '../../../../webroot/upload/' . $email . '.' . $id . '/' ;
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
