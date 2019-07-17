<?php

class Gallery{

  public function getAll($dir, &$results = array())
  {
    $files = scandir($dir);

    foreach($files as $key => $value){
        $ret = array();
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $ret['path'] = $dir;
            $ret['realPath'] = $dir.DIRECTORY_SEPARATOR.$value;   
            $ret['actionPath'] = str_replace("/Library/WebServer/Documents/frameworck/webroot/upload/","../../webroot/upload/",$dir) . DIRECTORY_SEPARATOR . $value;         
            $ret['isDir'] = false;
            $ret['val'] = $value;
            $results[] = $ret;
        } else if($value != "." && $value != "..") {
            $this->getAll($path, $results);
            $ret['path'] = $dir;
            $ret['realPath'] = $dir.DIRECTORY_SEPARATOR.$value;
            $ret['actionPath'] = str_replace("/Library/WebServer/Documents/frameworck/webroot/upload/","../../webroot/upload/",$dir); 
            $ret['isDir'] = true;
            $ret['val'] = $value;
            $results[] = $ret;
        }
    }

    return $results;
  }

}
