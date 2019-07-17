<?php

class UserIp {

  function getIp()
  {
      $ip = '';
      if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
    	}
    	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	}
    	else {
    		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    	}
      return $ip;
  }

}
