<?php

class Description_manager {
    protected $pdo;

    public function update($description, $status) {
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE description SET description=:description WHERE status=:status";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':description', $description , \PDO::PARAM_STR);
        $stmt->bindParam(':status', $status , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function get($status){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM description WHERE status=$status";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['description'] = $row['description'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getAll(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM description";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['description'] = $row['description'];
            $tmp['status'] = $row['status'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }
}
