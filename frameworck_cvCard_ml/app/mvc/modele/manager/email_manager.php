<?php

class Email_manager {
    protected $pdo;

    public function insert($email) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO email (myFrom, to, subject) VALUES (:myFrom, :to, :subject)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':myFrom', $email->getMyFrom() , \PDO::PARAM_STR);
        $stmt->bindParam(':to', $email->getTo() , \PDO::PARAM_STR);
        $stmt->bindParam(':subject', $email->getSubject() , \PDO::PARAM_STR);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return $e;
        }
        return true;
    }

    public function update($email) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE email SET myFrom=:myFrom, to=:to ,subject=:subject WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':myFrom', $email->getMyFrom() , \PDO::PARAM_STR);
        $stmt->bindParam(':to', $email->getTo() , \PDO::PARAM_STR);
        $stmt->bindParam(':subject', $email->getSubject() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $email->getId() , \PDO::PARAM_INT);
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

        $query="DELETE FROM email WHERE id=:id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);

        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return $e;
        }

        return true;
    }

    public function get() {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM email";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['myFrom'] = $row['myFrom'];
            $tmp['to'] = $row['to'];
            $tmp['subject'] = $row['subject'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM email WHERE id=:id";
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
