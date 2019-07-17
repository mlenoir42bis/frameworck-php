<?php

class DefaultController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function hello()
  {
    
    $secretKey = "hsFgynQGkyGmZYCI";    
    $request = "/default/hello/";

    $apiKey = $_GET['apiKey'];
    $keys = $_GET['keys'];

    $sign = base64_encode(hash_hmac('sha256', $request, $apiKey . $secretKey , true));
    
    if ($keys == $sign) {
      $ret['err'] = "false";
      $ret['keys'] = $keys;
      $ret['sign'] = $sign;
    }
    else {
      $ret['err'] = "true";
      $ret['keys'] = $keys;
      $ret['sign'] = $sign;
    }

    header('Content-type: text/plain');

    echo json_encode($_POST);
  }
}
