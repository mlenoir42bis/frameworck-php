<?php

class Honor_manager {
    protected $pdo;

    public function insert($honor) {

        $date = $honor->getDateObt();
        $title = $honor->getTitle();
        $description = $honor->getDescription();
        $order = $honor->getMyOrder();

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO honor
        (dateObt, title, description, myOrder)
         values
        (:dateObt, :title, :description, :myOrder)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':dateObt', $date , \PDO::PARAM_STR);
        $stmt->bindParam(':title', $title , \PDO::PARAM_STR);
        $stmt->bindParam(':description', $description , \PDO::PARAM_STR);
        $stmt->bindParam(':myOrder', $order , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function update($honor) {

        $date = $honor->getDateObt();
        $title = $honor->getTitle();
        $description = $honor->getDescription();
        $order = $honor->getId();

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE honor SET dateObt=:dateObt, title=:title, description=:description WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':dateObt', $date , \PDO::PARAM_STR);
        $stmt->bindParam(':title', $title , \PDO::PARAM_STR);
        $stmt->bindParam(':description', $description , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);
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

        $query="DELETE FROM honor WHERE id=:id";
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

        $query ="SELECT * FROM honor ORDER BY myOrder";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['dateObt'] = $row['dateObt'];
            $tmp['title'] = $row['title'];
            $tmp['description'] = $row['description'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM honor WHERE id=:id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);

        try{
            $stmt->execute();
        }catch (\Exception $e){
            return $e;
        }

        $result = $stmt->fetch();

        unset($this->pdo);
        return $result;
    }

    public function order($order, $id){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE honor SET myOrder=:myOrder WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':myOrder', $order , \PDO::PARAM_INT);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }
}
