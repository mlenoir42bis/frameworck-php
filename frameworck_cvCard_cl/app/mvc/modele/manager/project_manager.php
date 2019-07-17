<?php

class Project_manager {
    protected $pdo;

    public function get(){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM project";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['title'] = $row['title'];
            $tmp['description'] = $row['description'];
            $tmp['content'] = $row['content'];
            $tmp['pic'] = $row['pic'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM project WHERE id=$id";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
          $tmp['id'] = $row['id'];
          $tmp['title'] = $row['title'];
          $tmp['description'] = $row['description'];
          $tmp['content'] = $row['content'];
          $tmp['pic'] = $row['pic'];
          $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function insert($project){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO project
        (title, description, content, pic)
         VALUES
        (:title, :description, :content, :pic)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':title', $project->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':description', $project->getDescription() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $project->getContent() , \PDO::PARAM_STR);
        $stmt->bindParam(':pic', $project->getPic() , \PDO::PARAM_STR);

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

        $query="DELETE FROM project WHERE id=:id";
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
    public function updateWithPic($honor) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE project SET title=:title, description=:description, content=:content, pic=:pic WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':title', $honor->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':description', $honor->getDescription() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $honor->getContent() , \PDO::PARAM_STR);
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
      
        $query="UPDATE project SET title=:title, description=:description, content=:content WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':title', $honor->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':description', $honor->getDescription() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $honor->getContent() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $honor->getId() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }
}
