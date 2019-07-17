<?php

class Teaching_manager {
    protected $pdo;

    public function insert($data){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO teaching
        (title, content, dateStart, dateEnd, status, myOrder)
         values
        (:title, :content, :dateStart, :dateEnd, :status, :myOrder)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':title', $data->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $data->getContent() , \PDO::PARAM_STR);
        $stmt->bindParam(':dateStart', $data->getDateStart() , \PDO::PARAM_STR);
        $stmt->bindParam(':dateEnd', $data->getDateEnd() , \PDO::PARAM_STR);
        $stmt->bindParam(':status', $data->getStatus() , \PDO::PARAM_STR);
        $stmt->bindParam(':myOrder', $data->getMyOrder() , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function update($data){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query="UPDATE teaching SET title=:title, content=:content, dateStart=:dateStart, dateEnd=:dateEnd WHERE id=:id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':title', $data->getTitle() , \PDO::PARAM_STR);
        $stmt->bindParam(':content', $data->getContent() , \PDO::PARAM_STR);
        $stmt->bindParam(':dateStart', $data->getDateStart() , \PDO::PARAM_STR);
        $stmt->bindParam(':dateEnd', $data->getDateEnd() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $data->getId() , \PDO::PARAM_INT);

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

        $query="DELETE FROM teaching WHERE id=:id";
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

    public function get($status){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM teaching WHERE status = $status ORDER BY myOrder";

        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['title'] = $row['title'];
            $tmp['content'] = $row['content'];
            $tmp['dateStart'] = $row['dateStart'];
            $tmp['dateEnd'] = $row['dateEnd'];
            $tmp['status'] = $row['status'];
            $tmp['myOrder'] = $row['myOrder'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM teaching WHERE id=:id";

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

    public function order($order, $id){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE teaching SET myOrder=:myOrder WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':myOrder', $order , \PDO::PARAM_INT);
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
