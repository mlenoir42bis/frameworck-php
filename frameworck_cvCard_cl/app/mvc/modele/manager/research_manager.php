<?php

class Research_manager {
    protected $pdo;

    public function getInterest(){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM interest";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['content'] = $row['content'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getInterestById($id){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM interest WHERE id=:id";

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

    public function insert($content){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO interest
        (content)
         values
        (:content)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':content', $content , \PDO::PARAM_STR);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function update($content, $id){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE interest SET content=:content WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':content', $content , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function delete($id){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="DELETE FROM interest WHERE id=:id";
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

}
?>
