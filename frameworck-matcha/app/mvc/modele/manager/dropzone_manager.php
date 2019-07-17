<?php

class Dropzone_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }


    public function insert($dropzone){

        $query = "INSERT INTO dropzone
        (name, status, id_user)
         VALUES
        (:name, 0, :id_user)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $dropzone->getName() , \PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $dropzone->getId_user() , \PDO::PARAM_INT);

        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return $this->pdo->lastInsertId();;
    }

    public function delete($id){

        $query="DELETE FROM dropzone WHERE id=:id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);
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

        $query ="SELECT * FROM dropzone WHERE id_user = $id";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tmp['status'] = $row['status'];
            $tab[] = $tmp;
        }

        return $tab;
    }

    public function getById($id){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="SELECT * FROM dropzone WHERE id = $id";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tmp['status'] = $row['status'];
            $tab[] = $tmp;
        }

        return $tab;
    }

    public function getByIdUserStatus($id, $status){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="SELECT * FROM dropzone WHERE id_user=$id AND status=$status";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tmp['status'] = $row['status'];
            $tab[] = $tmp;
        }

        return $tab;
    }

    public function getCountByIdUser($id){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="SELECT COUNT(*) FROM dropzone WHERE id_user = $id";
        $result = $this->pdo->query($query);
        $nb = $result->fetch();
        return $nb;
    }

    public function nameExist($name, $id){
        if(!isset($name) || $name==""){
            return false;
        }
        $query = "SELECT * FROM dropzone WHERE name = :name AND id_user = $id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(":name", $name, \PDO::PARAM_STR);
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

    public function updateStatusById($id, $status){

        $query="UPDATE dropzone SET status=:status WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':status', $status, \PDO::PARAM_INT);
        $stmt->bindParam(':id',$id, \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function updateStatusByIdUser($idUser, $status){

        $query="UPDATE dropzone SET status=:status WHERE id_user=:id_user";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':status', $status, \PDO::PARAM_INT);
        $stmt->bindParam(':id_user',$idUser, \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function statusExistByIdUser($status, $idUser){
        if(!isset($name) || $name==""){
            return false;
        }
        $query = "SELECT * FROM dropzone WHERE status=:status AND id_user=:id_user";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(":name", $name, \PDO::PARAM_STR);
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

    public function getByIdWithEmailUser($id){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="SELECT d.name, d.status, d.id_user, u.email  FROM dropzone d join users u ON d.id_user = u.id WHERE d.id_user = $id";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['name'] = $row['name'];
            $tmp['status'] = $row['status'];
            $tmp['email'] = $row['email'];
            $tmp['id_user'] = $id;
            $tab[] = $tmp;
        }

        return $tab;
    }

}
