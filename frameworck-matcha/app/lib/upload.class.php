<?php

class Upload {
/*
* upload de fichier image
*/
function uploadImg($datas_file, $maxsize, $destination)
{

  $image = $datas_file['file']['name'];
  $extension = substr($image, strrpos($image, '.') + 1);

  $image = strtr($image, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
  $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);

  $newsFile = $destination . $image;
  $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

  $errorMsg = array();
  $err = false;
  if($datas_file['file']['error'] <> 0) {
    $errorMsg[] = "invalid parameter";
    $err = true;
  }
  if(!in_array($extension, $extensions_valides)) {
    $errorMsg[] = "Extension unknown";
    $err = true;
  }
  if($datas_file['file']['size'] > $maxsize) {
    $errorMsg[] = "File size too large";
    $err = true;
  }
  if($err) {
    $msg = $image . " : " . "<br />";
    $msg += implode("<br />", $errorMsg);
    $ret = [
      "resUpload" => false,
      "msg" => $msg,
    ];
  }
  else
  {
    $resultat = move_uploaded_file($datas_file['file']['tmp_name'] , $newsFile);
    if(!$resultat) {
      $msg = $image . " : " . "<br />" . 'Error when saving image';
    }
    else {
      $ret = [
        "resUpload" => true,
        "msg" => "Upload success",
        "img" => $image,
      ];
    }
  }
  return $ret;
}
}
