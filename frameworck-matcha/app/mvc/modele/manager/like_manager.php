<?php

class Like_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }

    public function getUserNotLikedOnPosInDist($id, $lat, $lng, $dist){
        if(!isset($id) || $id=="" || !isset($lat) || $lat=="" || !isset($lng) || $lng=="" || !isset($dist) || $dist==""){
            return false;
        }

        $query ="SELECT * FROM geolocation G WHERE
        (6366*acos(cos(radians($lat))*cos(radians(G.lat))*cos(radians($lng) - radians(G.lng))+sin(radians($lat))*sin(radians(G.lat)))) < $dist
        AND id_user != $id
        AND NOT EXISTS
          (SELECT * FROM liked L WHERE L.id_liked = G.id_user AND L.id_user = '$id')
        LIMIT 20";
        $result = $this->pdo->query($query);

        $tmp = array();
        foreach($result as $row){
            $tmp[] = $row['id_user'];
        }

        return $tmp;
    }

    public function getUserNotLikedOnPosInDistBySexe($id, $lat, $lng, $dist, $sexe, $orientation){
        if(!isset($id) || $id=="" || !isset($lat) || $lat=="" || !isset($lng) || $lng=="" || !isset($dist) || $dist==""  || !isset($sexe) || $sexe==""  || !isset($orientation) || $orientation==""){
            return false;
        }

        $query ="SELECT g.id_user, p.orientation FROM geolocation g JOIN profil p on g.id_user = p.id_user
        WHERE
        (6366*acos(cos(radians($lat))*cos(radians(g.lat))*cos(radians($lng) - radians(g.lng))+sin(radians($lat))*sin(radians(g.lat)))) < $dist
        AND g.id_user != $id
        AND p.sexe = '$sexe'
        AND (p.orientation = '$orientation' OR p.orientation = 'Bisexuelle')
        AND NOT EXISTS
          (SELECT * FROM liked l WHERE L.id_liked = G.id_user AND L.id_user = '$id')
        LIMIT 20";
        $result = $this->pdo->query($query);


        $tmp = array();
        foreach($result as $row){
            $tmp[] = $row['id_user'];
        }

        return $tmp;
    }

    public function insert($like){

        $query = "INSERT INTO liked
        (id_liked, id_user, status)
         values
        (:id_liked, :id_user, :status)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_liked', $like->getId_liked() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $like->getId_user() , \PDO::PARAM_INT);
        $stmt->bindParam(':status', $like->getStatus() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return $this->pdo->lastInsertId();;
    }

    public function update($like){

        $query="UPDATE liked SET status=:status WHERE id_liked=:id_liked AND id_user=:id_user";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':status', $like->getStatus() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_liked', $like->getId_liked() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $like->getId_user() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return true;
    }
    
    public function likeExist($idUser, $idLiked){
        if(!isset($idUser) || $idUser=="" || !isset($idLiked) || $idLiked==""){
            return false;
        }

        $query = "SELECT * FROM liked WHERE id_user = :id_user AND id_liked = :id_liked";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(":id_user", $idUser, \PDO::PARAM_INT);
        $stmt->bindParam(":id_liked", $idLiked, \PDO::PARAM_INT);
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

    public function getById($idUser, $idLiked){
      if(!isset($idUser) || $idUser=="" || !isset($idLiked) || $idLiked==""){
          return false;
      }

        $query ="SELECT * FROM liked WHERE id_user = :id_user AND id_liked = :id_liked";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(":id_user", $idUser, \PDO::PARAM_INT);
        $stmt->bindParam(":id_liked", $idLiked, \PDO::PARAM_INT);
        try {
            $stmt->execute();
        }catch (\Exception $e) {
          return false;
          die();
        }
        if($stmt->rowCount()!=1) {
          return false;
          die();
        }
        else {
          $result = $stmt->fetch();
          return $result;
        }
    }
}
