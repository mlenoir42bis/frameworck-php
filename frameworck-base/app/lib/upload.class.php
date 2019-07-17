<?php

class Upload {

  function uploadMultiple($files, $nameInput, $destination, $maxsize, $arrayExtension)
  {
    $i = 0;
    $global = array();

    while($files[$nameInput]['name'][$i]) {

      $nameFile = $files[$nameInput]['name'][$i];
      $extension = substr($nameFile, strrpos($nameFile, '.') + 1);
      $nameFile = strtr($nameFile, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
      $nameFile = preg_replace('/([^.a-z0-9]+)/i', '-', $nameFile);
      $newsFile = $destination . $nameFile;

      $globalFile = array();
      $errorMsg = array();
      $err = false;
      if($files[$nameInput]['error'][$i] <> 0) {
        $errorMsg['parameter'] = "invalid parameter";
        $err = true;
      }
      if(!in_array($extension, $arrayExtension)) {
        $errorMsg['extension'] = "Extension unknown";
        $err = true;
      }
      if($files[$nameInput]['size'][$i] > $maxsize) {
        $errorMsg['size'] = "File size too large";
        $err = true;
      }
      if($err) {
        $globalFile['err'] = true;
        $globalFile['file'] = $nameFile;
        $globalFile['msg'] = $errorMsg;
        $global[] = $globalFile;
        $err = false;
      }
      else
      {
        $resultat = move_uploaded_file($files[$nameInput]['tmp_name'][$i] , $newsFile);
        if(!$resultat) {
          $errorMsg['save'] = 'Error when saving image';
          $globalFile['err'] = true;
          $globalFile['file'] = $nameFile;
          $globalFile['msg'] = $errorMsg;
        }
        else {
          $globalFile['err'] = false;
          $globalFile['file'] = $nameFile;
          $globalFile['destination'] = $destination;
        }
        $global[] = $globalFile;
      }

      $i++;
    }

    return $global;
  }

  function uploadSimpl($files, $nameInput, $destination, $maxsize, $arrayExtension)
  {
    $image = $files[$nameInput]['name'];
    $extension = substr($image, strrpos($image, '.') + 1);

    $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

    $newsFile = $destination . $image;

    $errorMsg = array();
    $err = false;
    if($files[$nameInput]['error'] <> 0) {
      $errorMsg['parameter'] = "invalid parameter";
      $err = true;
    }
    if(!in_array($extension, $arrayExtension)) {
      $errorMsg['extension'] = "Extension unknown";
      $err = true;
    }
    if($files[$nameInput]['size'] > $maxsize) {
      $errorMsg['size'] = "File size too large";
      $err = true;
    }
    if($err) {
      $ret = [
        "err" => true,
        "msg" => $errorMsg,
        "img" => $image,
      ];
    }
    else
    {
      $resultat = move_uploaded_file($files[$nameInput]['tmp_name'] , $newsFile);
      if(!$resultat) {
        $errorMsg['save'] = "Error when saving image";
        $ret = [
          "err" => true,
          "msg" => $errorMsg,
          "img" => $image,
        ];
      }
      else {
        $ret = [
          "err" => false,
          "msg" => "Upload success",
          "img" => $image,
        ];
      }
    }
    return $ret;
  }

  function mv($array, $dif)
  {
    $i = 0;
    while ($array[$i]) {
      if ($array[$i]['err'] == false) {
        $hold = $array[$i]['destination'] . $array[$i]['file'];
        $news = $array[$i]['destination'] . $dif . $array[$i]['file'];
        rename ($hold, $news);
      }
      $i++;
    }
  }

  function nameDirUnknown($root)
  {
    $random = new random();
    $rand = $random->AlphaNumeric($lenght);
    $rootUnknown = $root . $rand . '/';
    $i = 0;
    $lenght = 4;
    while (is_dir($rootDest)) {
      $rand = $random->AlphaNumeric($lenght);
      $rootUnknown = $root . $rand . '/';
      if ($i > 99) {
        $lenght++;
        $i = 0;
      } else {
        $i++;
      }
    }
    return $rootUnknown;
  }

}
