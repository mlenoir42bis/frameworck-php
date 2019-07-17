<?php
class sessioncheck {
    public function isNotConnectedRedirect(){
      $sessionManager = new Session();
      if(!$sessionManager->Z45THYUpOp4POK67){
          $sessionManager->errorMessage= "Do not have access rights";
          header("Location: /page/signin/");
      }
    }
    public function isConnected(){
      $sessionManager = new Session();
      if($sessionManager->Z45THYUpOp4POK67){
          return true;
      }
      return false;
    }
}
