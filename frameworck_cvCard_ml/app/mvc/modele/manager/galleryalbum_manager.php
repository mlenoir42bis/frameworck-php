<?php

class GalleryAlbum_manager {
    protected $pdo;

    public function insert($album) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO galleryAlbum
        (name, user)
         values
        (:name, :user)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $album->getName() , \PDO::PARAM_STR);
        $stmt->bindParam(':user', $album->getUser() , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function update($album) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE galleryAlbum SET name=:name, user=:user WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':name', $album->getName() , \PDO::PARAM_STR);
        $stmt->bindParam(':user', $album->getUser() , \PDO::PARAM_INT);
        $stmt->bindParam(':id', $album->getId() , \PDO::PARAM_INT);
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

        $query="DELETE FROM galleryAlbum WHERE id=:id";
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

        $query ="SELECT * FROM galleryAlbum";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tmp['user'] = $row['user'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM galleryAlbum WHERE id=:id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);

        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }

        $result = $stmt->fetch();

        unset($this->pdo);
        return $result;
    }
}
