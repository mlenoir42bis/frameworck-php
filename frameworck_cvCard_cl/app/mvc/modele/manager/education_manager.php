<?php

class Education_manager {
    protected $pdo;

    public function insert($education){

        $lvl = $education->getLvl();
        $obtaining = $education->getObtaining();
        $title = $education->getTitleEducation();
        $description = $education->getDescriptionEducation();
        $order = $education->getMyOrder();

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO education
        (lvl, obtaining, titleEducation, descriptionEducation, myOrder)
         values
        (:lvl, :obtaining, :titleEducation, :descriptionEducation, :myOrder)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':lvl', $lvl , \PDO::PARAM_STR);
        $stmt->bindParam(':obtaining', $obtaining , \PDO::PARAM_STR);
        $stmt->bindParam(':titleEducation', $title , \PDO::PARAM_STR);
        $stmt->bindParam(':descriptionEducation', $description , \PDO::PARAM_STR);
        $stmt->bindParam(':myOrder', $order , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return true;
    }

    public function update($education){

        $lvl = $education->getLvl();
        $obtaining = $education->getObtaining();
        $title = $education->getTitleEducation();
        $description = $education->getDescriptionEducation();
        $id = $education->getId();

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE education SET lvl=:lvl, obtaining=:obtaining, titleEducation=:titleEducation, descriptionEducation=:descriptionEducation WHERE id=:id";

        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':lvl', $lvl , \PDO::PARAM_STR);
        $stmt->bindParam(':obtaining', $obtaining , \PDO::PARAM_STR);
        $stmt->bindParam(':titleEducation', $title , \PDO::PARAM_STR);
        $stmt->bindParam(':descriptionEducation', $description , \PDO::PARAM_STR);
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

        $query="DELETE FROM education WHERE id=:id";

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

    public function get(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM education ORDER BY myOrder";
        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['lvl'] = $row['lvl'];
            $tmp['obtaining'] = $row['obtaining'];
            $tmp['titleEducation'] = $row['titleEducation'];
            $tmp['descriptionEducation'] = $row['descriptionEducation'];
            $tmp['myOrder'] = $row['myOrder'];
            $tab[] = $tmp;
        }

        unset($this->pdo);
        return $tab;
    }

    public function getById($id){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM education WHERE id=:id";

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

        $query="UPDATE education SET myOrder=:myOrder WHERE id=:id";

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
