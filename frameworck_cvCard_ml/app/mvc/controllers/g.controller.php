<?php

class GController extends Controller
{
  protected $g;
  protected $request;
  protected $param;

  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  public function g()
  {
    echo "g";
  }
}
