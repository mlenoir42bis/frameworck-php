<?php

class SearchController extends Controller
{
  function ___construct($data = array())
  {
    parent::__construct($data);
  }

  public function get() {
    $sessionManager = new Session_manager();
    $id = $sessionManager->id;

    $idUser = isset($id)?$id:null;
    $ages=isset($_POST['ages'])?$_POST['ages']:null;
    $sizes=isset($_POST['sizes'])?$_POST['sizes']:null;
    $nbTag=isset($_POST['nbTag'])?$_POST['nbTag']:null;
    $localisation=isset($_POST['localisation'])?$_POST['localisation']:null;
    $offset=isset($_POST['offset'])?$_POST['offset']:null;

    $errorMsg = array();
    if(!isset($idUser) || $idUser==""){
        $errorMsg[] = "id Profil unknown";
    }
    if(!isset($ages) || $ages==""){
        $errorMsg[] = "ages unknown";
    }
    if(!isset($sizes) || $sizes==""){
        $errorMsg[] = "sizes unknown";
    }
    if(!isset($nbTag) || $nbTag==""){
        $errorMsg[] = "nbTag unknown";
    }
    if(!isset($offset) || $offset==""){
        $errorMsg[] = "nbTag unknown";
    }
    if(count($errorMsg)>0) {
        $ret = implode("<br/>", $errorMsg);
    }
    else {

        $usersManager = new Users_manager();
        $profil = $usersManager->setUserProfilGeoById($idProfil);
        $ret["noProfil"] = false;
        if ($profil)
        {
          $ages = explode(' ', $ages);
          $minAges = $ages[0];
          $minAges = $ages[2];
          $sizes = explode(' ', $sizes);
          $minSizes = $sizes[0];
          $minSizes = $sizes[2];
          $nbTag = explode(' ', $nbTag);
          $minHtAg = $nbTAg[0];
          $minHtAg = $nbTAg[2];

          if ($localisation) {
            $geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
            $url_address = utf8_encode($localisation);
            $url_address = urlencode($url_address);
            $query = sprintf($geocoder,$url_address);
            $results = file_get_contents($query);
            $results = json_decode($results, TRUE);
            $lat = $results['results'][0]['geometry']['location']['lat'];
            $lng = $results['results'][0]['geometry']['location']['lng'];
          }else {
            $lat = $profil['lat'];
            $lng = $profil['lng'];
          }
          if ($profil['orientation'] == "Heterosexuelle") {
            $orientation = "Heterosexuelle";
            if ($profil['sexe'] == "Mr") {
              $sexe = "Mme";
            }
            else if ($profil['sexe'] == "Mme"){
              $sexe = "Mr";
            }
            else {
              $all = true;
            }
          }
          else if ($profil['orientation'] == "Homosexuelle") {
            $orientation = "Homosexuelle";
            if ($profil['sexe'] == "Mr") {
              $sexe = "Mr";
            }
            else if ($profil['sexe'] == "Mme"){
              $sexe = "Mme";
            }
            else {
              $all = true;
            }
          }
          else {
            $all = true;
          }

        }
        else {
          $ret["noProfil"] = true;
        }

        $i = 0;
        $dist = 50;
        while ($i < 25) {
          if ($all) {
            $output = $usersManager->getUserOnPosWithFilter($id, $lat, $lng, $dist, $minAges, $maxAges, $minSizes, $maxSizes, $minHtag, $maxHtag, $offset);
          }
          else {
            $output = $usersManager->getUserOnPosWithFilterBySexe($id, $lat, $lng, $dist, $sexe, $orientation, $minAges, $maxAges, $minSizes, $maxSizes, $minHtag, $maxHtag, $offset);
          }
          if (count($output) >= 20) {
            break;
          }
          $dist += 50;
          $i++;
        }

        $ct = count($output);
        if ($ct > 0) {
          $j = 0;
          while ($j < 20 && $output[$j]) {
            $data[$j]['profil'] = $usersManager->selectByIdJoinProfil($output[$j]);
            $data[$j]['file'] = $dropManager->getByIdWithEmailUser($output[$j]);
            $j++;
          }
        }
        if (count($ret) <= 0) {
          $ret['err'] = true;
          $ret['msg'] = "Oups no more profil";
        }
        else {
          $ret['err'] = false;
          $ret['listProfil'] = $data;
        }
    }
    header('Content-type: text/plain');
    echo json_encode($ret);
  }

}
