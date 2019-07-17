<?php

class Verificator {
    function checkString($tab){
        $string = false;
        foreach ($tab as $k => $v){
            if (is_string($v)){
                continue;
            }
            else{
                $string = true;
            }
        }
    return $string;
    }
    function checkNumeric($tab){
        $numeric = false;
        foreach ($tab as $k => $v){
            if (is_numeric($v)){
                continue;
            }
            else{
                $numeric = true;
            }
        }
    return $numeric;
    }
    function checkEmail($email) {
        $is_valid = false;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $is_valid = true;
        }
    return $is_valid;
    }
    function checkPost($post){
        $is_valid = false;
        foreach ($post as $k => $v) {
            if($v == null) {
                $is_valid = true;
            }
        }
    return $is_valid;
    }
    function checkElemArray($seekVal,$val){
        $found = false;
            if(preg_match('/'.$seekVal.'/', $val)) {
                $found = true;
            }
    return $found;
    }
    function checkCaptcha($captcha) {

      $secret = "6LfxuyIUAAAAAEOv202SQk710Ex1ahtVqPa2zzmT";
      $response = $captcha;
      $remoteip = $_SERVER['REMOTE_ADDR'];
      
      $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
          . $secret
          . "&response=" . $response
          . "&remoteip=" . $remoteip ;
      
      $decode = json_decode(file_get_contents($api_url), true);
      
      if ($decode['success'] == true) {
          return true;
          die();
      }
      return false;
    }
}
