<?php

class Users_manager {
    protected $pdo;

  public function emailExist($email){
      if(!isset($email) || $email==""){
          return false;
      }

      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

      $query = "SELECT * FROM users WHERE email = :email";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":email", $email, \PDO::PARAM_STR);

      try{
          $stmt->execute();
      }catch (\Exception $e){
          unset($this->pdo);
          return false;
      }
      if($stmt->rowCount()>0){
          unset($this->pdo);
          return true;
      }
      unset($this->pdo);
      return false;
  }

  public function emailExistWithoutId($email, $id){
      if(!isset($email) || $email=="" || !isset($id) || $id==""){
          return false;
      }

      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

      $query = "SELECT * FROM users WHERE email=:email AND id!=:id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
      $stmt->bindParam(":id", $id, \PDO::PARAM_INT);

      try{
          $stmt->execute();
      }catch (\Exception $e){
          unset($this->pdo);
          return false;
      }
      if($stmt->rowCount()>0){
          unset($this->pdo);
          return true;
      }

      unset($this->pdo);
      return false;
  }

  public function validation($email, $password){
      if(!isset($email) || $email=="" || !isset($password) || $password=="")
      {
          return false;
      }

      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

      $query ="SELECT * FROM users WHERE email=:email";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":email", $email, \PDO::PARAM_STR);

      try{
          $stmt->execute();
      }catch (\Exception $e){
        unset($this->pdo);
        return false;
      }
      if($stmt->rowCount()!=1)
      {
        unset($this->pdo);
        return false;
      }
      else
      {
        $result = $stmt->fetch();
        unset($this->pdo);

        if (password_verify($password, $result['password'])) {
          return true;
        } else {
          return false;
        }
      }
  }

  public function selectById($id){
      if(!isset($id) || $id==""){
          return false;
      }

      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

      $query ="SELECT * FROM users WHERE id=:id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":id", $id, \PDO::PARAM_INT);

      try {
          $stmt->execute();
      }catch (\Exception $e) {
        unset($this->pdo);
        return false;
      }
      if($stmt->rowCount()!=1) {
        unset($this->pdo);
        return false;
      }
      else {
        $result = $stmt->fetch();
        unset($this->pdo);
        return $result;
      }
  }

}
