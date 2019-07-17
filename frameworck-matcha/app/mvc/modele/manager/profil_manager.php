<?php

class Profil_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }

    public function insert($profil){

        $query = "INSERT INTO profil
        (sexe, orientation , biographie, score, ages, sizes, id_user)
        VALUES
        (:sexe, :orientation , :biographie, 0, :ages, :sizes, :id_user)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':sexe', $profil->getSexe() , \PDO::PARAM_STR);
        $stmt->bindParam(':orientation', $profil->getOrientation() , \PDO::PARAM_STR);
        $stmt->bindParam(':biographie', $profil->getBiographie() , \PDO::PARAM_STR);
        $stmt->bindParam(':ages', $profil->getAges() , \PDO::PARAM_INT);
        $stmt->bindParam(':sizes', $profil->getSizes() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $profil->getId_user() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function profilExistByIdUser($id){
        if(!isset($id) || $id==""){
            return false;
        }
        $query = "SELECT * FROM profil WHERE id_user = :id_user";
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

    public function update($profil){

      $query="UPDATE profil SET
        sexe=:sexe,
        orientation=:orientation,
        biographie=:biographie,
        ages=:ages,
        sizes=:sizes
      WHERE
        id_user=:id_user";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':sexe', $profil->getSexe() , \PDO::PARAM_STR);
      $stmt->bindParam(':orientation', $profil->getOrientation() , \PDO::PARAM_STR);
      $stmt->bindParam(':biographie', $profil->getBiographie() , \PDO::PARAM_STR);
      $stmt->bindParam(':ages', $profil->getAges() , \PDO::PARAM_INT);
      $stmt->bindParam(':sizes', $profil->getSizes() , \PDO::PARAM_INT);
      $stmt->bindParam(':id_user', $profil->getId_user() , \PDO::PARAM_INT);
      try{
          $stmt->execute();
      }catch (\Exception $e){
          return false;
      }
      return true;
    }

    public function selectById($id){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="SELECT * from profil where id_user=:id_user";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(":id_user", $id, \PDO::PARAM_INT);
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
