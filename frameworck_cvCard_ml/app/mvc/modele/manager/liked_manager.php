<?php

class Liked_manager {
    protected $pdo;

    public function insert($liked) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO liked
        (id_liked, user, status)
         values
        (:id_liked, :user, :status)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_liked', $liked->getId_liked() , \PDO::PARAM_INT);
        $stmt->bindParam(':user', $liked->getUser() , \PDO::PARAM_STR);
        $stmt->bindParam(':status', $liked->getStatus() , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function update($liked) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE liked SET id_liked=:idliked, user=:user, status=:status WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':user', $liked->getUser() , \PDO::PARAM_STR);
        $stmt->bindParam(':status', $liked->getStatus() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_liked', $liked->getId_liked() , \PDO::PARAM_INT);
        $stmt->bindParam(':id', $liked->getId() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function delete($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="DELETE FROM liked WHERE id=:id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function get() {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM liked";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tmp['user'] = $row['user'];
            $tmp['status'] = $row['status'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM liked WHERE id=:id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);

        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }

        $result = $stmt->fetch();

        unset($this->pdo);
        return $result;
    }

    public function userLikeExist($data){
        if(!isset($data) || $data==""){
            return false;
        }

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query = "SELECT * FROM liked WHERE user=:user AND id_liked=:idliked";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(":user", $data->getUser(), \PDO::PARAM_STR);
        $stmt->bindParam(":idliked", $data->getId_liked(), \PDO::PARAM_INT);
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

}
