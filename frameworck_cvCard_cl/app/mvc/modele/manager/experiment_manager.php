<?php

class Experiment_manager {
    protected $pdo;

    public function insert($experiment){

        $dateStart = $experiment->getDateStart();
        $dateEnd = $experiment->getDateEnd();
        $titleExperiment = $experiment->getTitleExperiment();
        $descriptionExperiment = $experiment->getDescriptionExperiment();
        $myOrder = $experiment->getMyOrder();

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO experiment
        (dateStart, dateEnd, titleExperiment, descriptionExperiment, myOrder)
         values
        (:dateStart, :dateEnd, :titleExperiment, :descriptionExperiment, :myOrder)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':dateStart', $dateStart , \PDO::PARAM_STR);
        $stmt->bindParam(':dateEnd', $dateEnd , \PDO::PARAM_STR);
        $stmt->bindParam(':titleExperiment', $titleExperiment , \PDO::PARAM_STR);
        $stmt->bindParam(':descriptionExperiment', $descriptionExperiment , \PDO::PARAM_STR);
        $stmt->bindParam(':myOrder', $myOrder , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function update($experiment){

        $dateStart = $experiment->getDateStart();
        $dateEnd = $experiment->getDateEnd();
        $titleExperiment = $experiment->getTitleExperiment();
        $descriptionExperiment = $experiment->getDescriptionExperiment();
        $id = $experiment->getId();

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE experiment SET dateStart=:dateStart, dateEnd=:dateEnd, titleExperiment=:titleExperiment, descriptionExperiment=:descriptionExperiment WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':dateStart', $dateStart , \PDO::PARAM_STR);
        $stmt->bindParam(':dateEnd', $dateEnd , \PDO::PARAM_STR);
        $stmt->bindParam(':titleExperiment', $titleExperiment , \PDO::PARAM_STR);
        $stmt->bindParam(':descriptionExperiment', $descriptionExperiment , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function order($order, $id){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE experiment SET myOrder=:myOrder WHERE id=:id";

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

    public function delete($id){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="DELETE FROM experiment WHERE id=:id";
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

        $query ="SELECT * FROM experiment ORDER BY myOrder";

        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['dateStart'] = $row['dateStart'];
            $tmp['dateEnd'] = $row['dateEnd'];
            $tmp['titleExperiment'] = $row['titleExperiment'];
            $tmp['descriptionExperiment'] = $row['descriptionExperiment'];
            $tmp['myOrder'] = $row['myOrder'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id){
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM experiment WHERE id=:id";
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
