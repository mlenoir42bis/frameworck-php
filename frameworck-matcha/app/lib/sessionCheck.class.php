<?php
class sessionCheck {
    public function isNotConnectedRedirect(){
      $sessionManager = new Session_manager();
      if(!$sessionManager->Z45THYUpOp4POK67){
          $sessionManager->errorMessage= "Do not have access rights";
          header("Location: /page/index/");
      }
    }
    public function isConnected(){
      $sessionManager = new Session_manager();
      if($sessionManager->Z45THYUpOp4POK67){
          return true;
      }
      return false;
    }
}
