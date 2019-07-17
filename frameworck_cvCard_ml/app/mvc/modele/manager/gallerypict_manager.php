<?php

class GalleryPict_manager {
    protected $pdo;

    public function insert($pict) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO galleryPict
        (pict, album, user)
         values
        (:pict, :album, :user)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':pict', $pict->getPict() , \PDO::PARAM_STR);
        $stmt->bindParam(':album', $pict->getAlbum() , \PDO::PARAM_INT);
        $stmt->bindParam(':user', $pict->getUser() , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function update($pict) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE galleryPict SET pict=:pict, album=:album, user=:user WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':pict', $pict->getPict() , \PDO::PARAM_STR);
        $stmt->bindParam(':album', $pict->getAlbum() , \PDO::PARAM_INT);
        $stmt->bindParam(':user', $pict->getUser() , \PDO::PARAM_INT);
        $stmt->bindParam(':id', $pict->getId() , \PDO::PARAM_INT);
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

        $query="DELETE FROM galleryPict WHERE id=:id";
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

        $query ="SELECT * FROM galleryPict";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['pict'] = $row['pict'];
            $tmp['album'] = $row['album'];
            $tmp['user'] = $row['user'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getSwipe($album) {
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM galleryPict G WHERE album=:album
        AND NOT EXISTS
          (SELECT * FROM liked L WHERE L.id_liked=G.id AND L.user=:user)";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':album', $album->getAlbum() , \PDO::PARAM_INT);
        $stmt->bindParam(':user', $album->getUser() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
        }catch (\Exception $e){
            return false;
        }

        $result = $stmt->fetchAll();
        unset($this->pdo);
        return $result;
    }

    public function getById($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM galleryPict WHERE id=:id";
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
