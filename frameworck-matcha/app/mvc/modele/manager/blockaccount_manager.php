<?php

class Blockaccount_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }

    public function insert($block){
        $query = "INSERT INTO blockaccount
        (id_blocked, id_blocker)
         values
        (:id_blocked, :id_blocker)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_blocked', $block->getId_blocked() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_blocker', $block->getId_blocker() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function blockExist($block){
        $query = "SELECT * FROM blockaccount WHERE id_blocked = :id_blocked AND id_blocker = :id_blocker";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id_blocked', $block->getId_blocked() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_blocker', $block->getId_blocker() , \PDO::PARAM_INT);
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
