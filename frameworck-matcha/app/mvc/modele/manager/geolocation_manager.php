<?php

class Geolocation_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }

    public function insert($geo){

        $query = "INSERT INTO geolocation
        (country, state, city, postal, adresse, lat, lng, id_user)
         values
        (:country, :state, :city, :postal, :adresse, :lat, :lng, :id_user)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':country', ($geo->getCountry() != NULL) ? $geo->getCountry() : NULL, \PDO::PARAM_STR);
        $stmt->bindParam(':state', ($geo->getState() != NULL) ? $geo->getState() : NULL, \PDO::PARAM_STR);
        $stmt->bindParam(':city', ($geo->getCity() != NULL) ? $geo->getCity() : NULL, \PDO::PARAM_STR);
        $stmt->bindParam(':postal', ($geo->getPostal() != NULL) ? $geo->getPostal() : NULL, \PDO::PARAM_STR);
        $stmt->bindParam(':adresse', ($geo->getAdresse() != NULL) ? $geo->getAdresse() : NULL, \PDO::PARAM_STR);
        $stmt->bindParam(':lat', ($geo->getLat() != NULL) ? $geo->getLat() : NULL, \PDO::PARAM_STR);
        $stmt->bindParam(':lng', ($geo->getLng() != NULL) ? $geo->getLng() : NULL, \PDO::PARAM_STR);
        $stmt->bindParam(':id_user', ($geo->getId_user() != NULL) ? $geo->getId_user() : NULL, \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function getByIdUser($id){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="select * from geolocation where id_user = $id";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['country'] = $row['country'];
            $tmp['state'] = $row['state'];
            $tmp['city'] = $row['city'];
            $tmp['postal'] = $row['postal'];
            $tmp['adresse'] = $row['adresse'];
            $tmp['lat'] = $row['lat'];
            $tmp['lng'] = $row['lng'];
            $tmp['id_user'] = $row['id_user'];
            $tab[] = $tmp;
        }

        return $tab;
    }

    public function existByIdUser($id){
        if(!isset($id) || $id==""){
            return false;
        }
        $query = "SELECT * FROM geolocation WHERE id_user = :id_user";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(":id_user", $id, \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        if($stmt->rowCount()>0){
            return true;
        }
        return false;
    }

    public function updateByIdUser($geo){

      $query="UPDATE geolocation SET
        country=:country,
        state=:state,
        city=:city,
        postal=:postal,
        adresse=:adresse,
        lat=:lat,
        lng=:lng
      WHERE
        id_user=:id_user";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':country', ($geo->getCountry() != NULL) ? $geo->getCountry() : NULL, \PDO::PARAM_STR);
      $stmt->bindParam(':state', ($geo->getState() != NULL) ? $geo->getState() : NULL, \PDO::PARAM_STR);
      $stmt->bindParam(':city', ($geo->getCity() != NULL) ? $geo->getCity() : NULL, \PDO::PARAM_STR);
      $stmt->bindParam(':postal', ($geo->getPostal() != NULL) ? $geo->getPostal() : NULL, \PDO::PARAM_STR);
      $stmt->bindParam(':adresse', ($geo->getAdresse() != NULL) ? $geo->getAdresse() : NULL, \PDO::PARAM_STR);
      $stmt->bindParam(':lat', ($geo->getLat() != NULL) ? $geo->getLat() : NULL, \PDO::PARAM_STR);
      $stmt->bindParam(':lng', ($geo->getLng() != NULL) ? $geo->getLng() : NULL, \PDO::PARAM_STR);
      $stmt->bindParam(':id_user', ($geo->getId_user() != NULL) ? $geo->getId_user() : NULL, \PDO::PARAM_INT);
      try{
          $stmt->execute();
      }catch (\Exception $e){
          return false;
      }
      return true;
    }

    public function getUserOnPosInDist($id, $lat, $lng, $dist){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="SELECT * FROM geolocation
        WHERE
        (6366*acos(cos(radians($lat))*cos(radians(`lat`))*cos(radians($lng) -radians(`lng`))+sin(radians($lat))*sin(radians(`lat`)))) < $dist
        AND id_user != $id";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id_user'] = $row['id_user'];
            $tab[] = $tmp;
        }

        return $tab;
    }
  }
