<?php

class Badaccount_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }

    public function insert($bad){
        $query = "INSERT INTO badAccount
        (id_badAccount, id_report)
         values
        (:id_badAccount, :id_report)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_badAccount', $bad->getId_badAccount() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_report', $bad->getId_report() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function reportExist($bad){
        $query = "SELECT * FROM badAccount WHERE id_badAccount = :id_badAccount AND id_report = :id_report";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id_badAccount', $bad->getId_badAccount() , \PDO::PARAM_INT);
        $stmt->bindParam(':id_report', $bad->getId_report() , \PDO::PARAM_INT);
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
