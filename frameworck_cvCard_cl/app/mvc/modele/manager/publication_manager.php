<?php

class Publication_manager {
    protected $pdo;

    public function insert($publication){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO publication
        (title, author, myRelease, type, file, link, content, dateYear)
         values
        (:title, :author, :myRelease, :type, :file, :link, :content, :dateYear)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':title', $publication->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':author', $publication->getAuthor() , \PDO::PARAM_STR);
        $stmt->bindParam(':myRelease', $publication->getMyRelease() , \PDO::PARAM_STR);
        $stmt->bindParam(':type', $publication->getType() , \PDO::PARAM_STR);
        $stmt->bindParam(':file', $publication->getFile() , \PDO::PARAM_STR);
        $stmt->bindParam(':link', $publication->getLink() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $publication->getContent() , \PDO::PARAM_STR);
        $stmt->bindParam(':dateYear', $publication->getDateYear() , \PDO::PARAM_STR);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function updateWithFile($publication){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE publication SET title=:title, author=:author, myRelease=:myRelease, type=:type, file=:file, link=:link, content=:content, dateYear=:dateYear WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':title', $publication->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':author', $publication->getAuthor() , \PDO::PARAM_STR);
        $stmt->bindParam(':myRelease', $publication->getMyRelease() , \PDO::PARAM_STR);
        $stmt->bindParam(':type', $publication->getType() , \PDO::PARAM_STR);
        $stmt->bindParam(':file', $publication->getFile() , \PDO::PARAM_STR);
        $stmt->bindParam(':link', $publication->getLink() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $publication->getContent() , \PDO::PARAM_STR);
        $stmt->bindParam(':dateYear', $publication->getDateYear() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $publication->getId() , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function update($publication){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE publication SET title=:title, author=:author, myRelease=:myRelease, type=:type, link=:link, content=:content, dateYear=:dateYear WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':title', $publication->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':author', $publication->getAuthor() , \PDO::PARAM_STR);
        $stmt->bindParam(':myRelease', $publication->getMyRelease() , \PDO::PARAM_STR);
        $stmt->bindParam(':type', $publication->getType() , \PDO::PARAM_STR);
        $stmt->bindParam(':link', $publication->getLink() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $publication->getContent() , \PDO::PARAM_STR);
        $stmt->bindParam(':dateYear', $publication->getDateYear() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $publication->getId() , \PDO::PARAM_INT);

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

        $query="DELETE FROM publication WHERE id=:id";

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

        $query ="SELECT * FROM publication";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['title'] = $row['title'];
            $tmp['author'] = $row['author'];
            $tmp['myRelease'] = $row['myRelease'];
            $tmp['type'] = $row['type'];
            $tmp['file'] = $row['file'];
            $tmp['link'] = $row['link'];
            $tmp['content'] = $row['content'];
            $tmp['dateYear'] = $row['dateYear'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM publication WHERE id=:id";

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
