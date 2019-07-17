<?php

class Htag_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }


    public function insert($htag){

        $query = "INSERT INTO htag
        (name, id_user)
         values
        (:name, :id_user)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $htag->getName() , \PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $htag->getId_user() , \PDO::PARAM_INT);

        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return $this->pdo->lastInsertId();;
    }

    public function getByIdUser($id){
        if(!isset($id) || $id==""){
            return false;
        }

        $query ="select * from htag where id_user = $id";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tab[] = $tmp;
        }

        return $tab;
    }

    public function autoComplete($text){
        if(!isset($text) || $text==""){
            return false;
        }

        $query ="SELECT name AS name FROM htag WHERE name LIKE '$text%' GROUP BY name";
        $result = $this->pdo->query($query);

        $tab = array();
        foreach($result as $row){
            $tab[] = $row['name'];
        }

        return $tab;
    }
}
