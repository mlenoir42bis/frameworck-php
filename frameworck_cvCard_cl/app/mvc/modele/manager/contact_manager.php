<?php

class Contact_manager {
    protected $pdo;

    public function update($data){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query="UPDATE contact SET description=:description, officeNumber=:officeNumber, labNumber=:labNumber, firstEmail=:firstEmail, secondEmail=:secondEmail, skype=:skype, twitter=:twitter, linkedin=:linkedin, descriptionOffice=:descriptionOffice, descriptionWork=:descriptionWork  WHERE id=:id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':description', $data->getDescription() , \PDO::PARAM_STR);
        $stmt->bindParam(':officeNumber', $data->getOfficeNumber() , \PDO::PARAM_STR);
        $stmt->bindParam(':labNumber', $data->getLabNumber() , \PDO::PARAM_STR);
        $stmt->bindParam(':firstEmail', $data->getFirstEmail() , \PDO::PARAM_STR);
        $stmt->bindParam(':secondEmail', $data->getSecondEmail() , \PDO::PARAM_STR);
        $stmt->bindParam(':skype', $data->getSkype() , \PDO::PARAM_STR);
        $stmt->bindParam(':twitter', $data->getTwitter() , \PDO::PARAM_STR);
        $stmt->bindParam(':linkedin', $data->getLinkedin() , \PDO::PARAM_STR);
        $stmt->bindParam(':descriptionOffice', $data->getDescriptionOffice() , \PDO::PARAM_STR);
        $stmt->bindParam(':descriptionWork', $data->getDescriptionWork() , \PDO::PARAM_STR);
        $stmt->bindParam(':id', $data->getId() , \PDO::PARAM_INT);

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

        $query = "SELECT * FROM contact";

        $result = $this->pdo->query($query);

        $tab = array();
        $tmp = array();
        foreach($result as $row){
            $tmp['id'] = $row['id'];
            $tmp['description'] = $row['description'];
            $tmp['officeNumber'] = $row['officeNumber'];
            $tmp['labNumber'] = $row['labNumber'];
            $tmp['firstEmail'] = $row['firstEmail'];
            $tmp['secondEmail'] = $row['secondEmail'];
            $tmp['skype'] = $row['skype'];
            $tmp['twitter'] = $row['twitter'];
            $tmp['linkedin'] = $row['linkedin'];
            $tmp['descriptionOffice'] = $row['descriptionOffice'];
            $tmp['descriptionWork'] = $row['descriptionWork'];
            $tab[] = $tmp;
        }
        unset($this->pdo);
        return $tab;
    }
}
