<?php

class PostMap_manager {
    protected $pdo;

    public function insert($postMap) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO postMap
        (pict, subject, lat, lng)
         values
        (:pict, :subject, :lat, :lng)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':pict', $postMap->getPict() , \PDO::PARAM_STR);
        $stmt->bindParam(':subject', $postMap->getSubject() , \PDO::PARAM_STR);
        $stmt->bindParam(':lat', $postMap->getLat() , \PDO::PARAM_STR);
        $stmt->bindParam(':lng', $postMap->getLng() , \PDO::PARAM_STR);

        try{
            $stmt->execute();
            $id = $this->pdo->lastInsertId();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return $id;
    }

    public function update($postMap) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE postMap SET pict=:pict, subject=:subject , lat=:lat, lng=:lng WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':pict', $postMap->getPict() , \PDO::PARAM_STR);
        $stmt->bindParam(':subject', $postMap->getSubject() , \PDO::PARAM_STR);
        $stmt->bindParam(':lat', $postMap->getLat() , \PDO::PARAM_STR);
        $stmt->bindParam(':lng', $postMap->getLng() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $postMap->getId() , \PDO::PARAM_INT);
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

        $query="DELETE FROM postMap WHERE id=:id";
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

        $query ="SELECT * FROM postMap";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['pict'] = $row['pict'];
            $tmp['subject'] = $row['subject'];
            $tmp['lat'] = $row['lat'];
            $tmp['lng'] = $row['lng'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM postMap WHERE id=:id";
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
