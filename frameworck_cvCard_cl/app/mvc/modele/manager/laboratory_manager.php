<?php

class Laboratory_manager {
    protected $pdo;

    public function insert($laboratory) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO laboratory
        (name, fonction, pic)
         values
        (:name, :fonction, :pic)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $laboratory->getName() , \PDO::PARAM_STR);
        $stmt->bindParam(':fonction', $laboratory->getFonction() , \PDO::PARAM_STR);
        $stmt->bindParam(':pic', $laboratory->getPic() , \PDO::PARAM_STR);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function updateWithPic($honor) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE laboratory SET name=:name, fonction=:fonction, pic=:pic WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':name', $honor->getName() , \PDO::PARAM_STR);
        $stmt->bindParam(':fonction', $honor->getFonction() , \PDO::PARAM_STR);
        $stmt->bindParam(':pic', $honor->getPic() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $honor->getId() , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }
    public function update($honor) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE laboratory SET name=:name, fonction=:fonction WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':name', $honor->getName() , \PDO::PARAM_STR);
        $stmt->bindParam(':fonction', $honor->getFonction() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $honor->getId() , \PDO::PARAM_INT);

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

        $query="DELETE FROM laboratory WHERE id=:id";
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

        $query ="SELECT * FROM laboratory";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tmp['fonction'] = $row['fonction'];
            $tmp['pic'] = $row['pic'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM laboratory WHERE id=:id";
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
}
