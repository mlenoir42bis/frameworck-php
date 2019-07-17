<?php

class Gallery_manager {
    protected $pdo;

    public function insert($data){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO gallery
        (picture)
         values
        (:picture)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':picture', $data->getPicture() , \PDO::PARAM_STR);

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

        $query="DELETE FROM gallery WHERE id=:id";

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

    public function get(){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM gallery";

        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['picture'] = $row['picture'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

}
