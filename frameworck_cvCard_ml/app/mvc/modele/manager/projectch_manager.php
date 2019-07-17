<?php

class ProjectCh_manager {
    protected $pdo;

    public function insert($data) {
      $dbManager = new Db_manager();
      $this->pdo = $dbManager->getConnection();

        $query = "INSERT INTO projectCh 
        (name, 
        firstname, 
        country, 
        adress, 
        cp,
        lat, 
        lng, 
        statusLegal, 
        denomination, 
        presentation, 
        typeApp, 
        contextProject, 
        objectifProject,
        constraintProject,
        usersProject,
        descriptionProject, 
        language,
        multiLanguage,
        traduction,
        stat, 
        dateEndProjectBool, 
        dateEndProject, 
        maintenance, 
        nameField, 
        accomodation,
        security,
        technology, 
        bdd, 
        designBool,
        infoDesign, 
        budget, 
        billing, 
        answer,
        email, 
        tel, 
        preference_answer, 
        start_preference_answer, 
        end_preference_answer, 
        quotation, 
        registration, 
        upgrade) VALUES 
        (:name, 
        :firstname, 
        :country, 
        :adress, 
        :cp,
        :lat, 
        :lng, 
        :statusLegal, 
        :denomination, 
        :presentation, 
        :typeApp, 
        :contextProject,
        :objectifProject, 
        :constraintProject,
        :usersProject,
        :descriptionProject, 
        :language,
        :multiLanguage,
        :traduction, 
        :stat, 
        :dateEndProjectBool, 
        :dateEndProject, 
        :maintenance,
        :nameField, 
        :accomodation,
        :security,
        :technology, 
        :bdd, 
        :designBool,
        :infoDesign, 
        :budget, 
        :billing, 
        :answer,
        :email, 
        :tel, 
        :preference_answer, 
        :start_preference_answer, 
        :end_preference_answer, 
        :quotation, 
        :registration, 
        :upgrade)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $data['name'] , \PDO::PARAM_STR);
        $stmt->bindParam(':firstname', $data['firstname'] , \PDO::PARAM_STR);
        $stmt->bindParam(':country', $data['country'] , \PDO::PARAM_STR);
        $stmt->bindParam(':adress', $data['adress'] , \PDO::PARAM_STR);
        $stmt->bindParam(':cp', $data['cp'] , \PDO::PARAM_INT);
        $stmt->bindParam(':lat', $data['lat'] , \PDO::PARAM_STR);
        $stmt->bindParam(':lng', $data['lng'] , \PDO::PARAM_STR);
        $stmt->bindParam(':statusLegal', $data['statusLegal'] , \PDO::PARAM_STR);
        $stmt->bindParam(':denomination', $data['denomination'] , \PDO::PARAM_STR);
        $stmt->bindParam(':presentation', $data['presentation'] , \PDO::PARAM_STR);
        $stmt->bindParam(':typeApp', $data['typeApp'] , \PDO::PARAM_STR);
        $stmt->bindParam(':contextProject', $data['contextProject'] , \PDO::PARAM_STR);
        $stmt->bindParam(':objectifProject', $data['objectifProject'] , \PDO::PARAM_STR);
        $stmt->bindParam(':constraintProject', $data['constraintProject'] , \PDO::PARAM_STR);
        $stmt->bindParam(':usersProject', $data['usersProject'] , \PDO::PARAM_STR);
        $stmt->bindParam(':descriptionProject', $data['descriptionProject'] , \PDO::PARAM_STR);
        $stmt->bindParam(':language', $data['language'] , \PDO::PARAM_STR);
        $stmt->bindParam(':multiLanguage', $data['multiLanguage'] , \PDO::PARAM_STR);
        $stmt->bindParam(':traduction', $data['traduction'] , \PDO::PARAM_STR);
        $stmt->bindParam(':stat', $data['stat'] , \PDO::PARAM_STR);
        $stmt->bindParam(':dateEndProjectBool', $data['dateEndProjectBool'] , \PDO::PARAM_STR);
        $stmt->bindParam(':dateEndProject', $data['dateEndProject'] , \PDO::PARAM_STR);
        $stmt->bindParam(':maintenance', $data['maintenance'] , \PDO::PARAM_STR);
        $stmt->bindParam(':nameField', $data['nameField'] , \PDO::PARAM_STR);
        $stmt->bindParam(':accomodation', $data['accomodation'] , \PDO::PARAM_STR);
        $stmt->bindParam(':security', $data['security'] , \PDO::PARAM_STR);
        $stmt->bindParam(':technology', $data['technology'] , \PDO::PARAM_STR);
        $stmt->bindParam(':bdd', $data['bdd'] , \PDO::PARAM_STR);
        $stmt->bindParam(':designBool', $data['designBool'] , \PDO::PARAM_STR);
        $stmt->bindParam(':infoDesign', $data['infoDesign'] , \PDO::PARAM_STR);
        $stmt->bindParam(':budget', $data['budget'] , \PDO::PARAM_INT);
        $stmt->bindParam(':billing', $data['billing'] , \PDO::PARAM_STR);
        $stmt->bindParam(':answer', $data['answer'] , \PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'] , \PDO::PARAM_STR);
        $stmt->bindParam(':tel', $data['tel'] , \PDO::PARAM_STR);
        $stmt->bindParam(':preference_answer', $data['preference_answer'] , \PDO::PARAM_STR);
        $stmt->bindParam(':start_preference_answer', $data['start_preference_answer'] , \PDO::PARAM_STR);
        $stmt->bindParam(':end_preference_answer', $data['end_preference_answer'] , \PDO::PARAM_STR);
        $stmt->bindParam(':quotation', $data['quotation'] , \PDO::PARAM_INT);
        $stmt->bindParam(':registration', $data['registration'] , \PDO::PARAM_INT);
        $stmt->bindParam(':upgrade', $data['upgrade'] , \PDO::PARAM_STR);
   
        try{
            $stmt->execute();
            $id = $this->pdo->lastInsertId();
            unset($this->pdo);
        }catch (\Exception $e){
            return false;
        }
        return $id;
    }

    public function get() {

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM projectCh";
        $stmt = $this->pdo->prepare($query);

        try{
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (\Exception $e){
            $result = false;
        }
        unset($this->pdo);

        if ($result) {
            
            $tab = array();
            $tmp = array();
            foreach($result as $row){
                $tmp['id'] = $row['id'];
                $tmp['name'] = $row['name']; 
                $tmp['firstname'] = $row['firstname'];
                $tmp['country'] = $row['country'];
                $tmp['adress'] = $row['adress'];
                $tmp['cp'] = $row['cp'];
                $tmp['lat'] = $row['lat'];
                $tmp['lng'] = $row['lng'];
                $tmp['statusLegal'] = $row['statusLegal'];
                $tmp['denomination'] = $row['denomination'];
                $tmp['presentation'] = $row['presentation'];
                $tmp['typeApp'] = $row['typeApp'];
                $tmp['contextProject'] = $row['contextProject'];
                $tmp['objectifProject'] = $row['objectifProject'];
                $tmp['constraintProject'] = $row['constraintProject'];
                $tmp['usersProject'] = $row['usersProject'];
                $tmp['descriptionProject'] = $row['descriptionProject'];
                $tmp['language'] = $row['language'];
                $tmp['multiLanguage'] = $row['multiLanguage'];
                $tmp['traduction'] = $row['traduction'];
                $tmp['stat'] = $row['stat'];
                $tmp['dateEndProjectBool'] = $row['dateEndProjectBool'];
                $tmp['dateEndProject'] = $row['dateEndProject'];
                $tmp['maintenance'] = $row['maintenance'];
                $tmp['nameField'] = $row['nameField'];
                $tmp['accomodation'] = $row['accomodation'];
                $tmp['security'] = $row['security'];
                $tmp['technology'] = $row['technology'];
                $tmp['bdd'] = $row['bdd'];
                $tmp['designBool'] = $row['designBool'];
                $tmp['infoDesign'] = $row['infoDesign'];
                $tmp['budget'] = $row['budget'];
                $tmp['billing'] = $row['billing'];
                $tmp['answer'] = $row['answer'];
                $tmp['email'] = $row['email'];
                $tmp['tel'] = $row['tel'];
                $tmp['preference_answer'] = $row['preference_answer'];
                $tmp['start_preference_answer'] = $row['start_preference_answer'];
                $tmp['end_preference_answer'] = $row['end_preference_answer'];
                $tmp['quotation'] = $row['quotation'];
                $tmp['registration'] = $row['registration'];
                $tmp['upgrade'] = $row['upgrade'];
                
                $dbManager = new Db_manager();
                $this->pdo = $dbManager->getConnection();

                $query ="SELECT * FROM fonctionnalityProjectCh WHERE id_parent = :id_parent AND parentTable = :parentTable";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':id_parent', $row['id'] , \PDO::PARAM_INT);
                $parentTable = "projectCh";
                $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);

                try{
                    $stmt->execute();
                    $tmp['fonctionnalityProject'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch (\Exception $e){
                    $tmp['fonctionnalityProject'] = false;
                }
                unset($this->pdo);

                $dbManager = new Db_manager();
                $this->pdo = $dbManager->getConnection();

                $query ="SELECT * FROM pageProjectCh WHERE id_parent = :id_parent";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':id_parent', $row['id'] , \PDO::PARAM_INT);

                try{
                    $stmt->execute();
                    $tmp['pageProject'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch (\Exception $e){
                    $tmp['pageProject'] = false;
                }
                unset($this->pdo);

                if ($tmp['pageProject']) {
                    $i = 0;
                    while ($i < count($tmp['pageProject'])) {
                        $dbManager = new Db_manager();
                        $this->pdo = $dbManager->getConnection();
            
                        $query ="SELECT * FROM fonctionnalityProjectCh WHERE id_parent = :id_parent AND parentTable = :parentTable";
                        $stmt = $this->pdo->prepare($query);
                        $stmt->bindParam(':id_parent', $tmp['pageProject'][$i]['id'] , \PDO::PARAM_INT);
                        $parentTable = "pageProjectCh";
                        $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);
            
                            try{
                                $stmt->execute();
                                $tmp['pageProject'][$i]['fonctionnalityPage'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            }catch (\Exception $e){
                                $tmp['pageProject'][$i]['fonctionnalityPage'] = false;
                            }             
                        unset($this->pdo);
                        $dbManager = new Db_manager();
                        $this->pdo = $dbManager->getConnection();

                        $query ="SELECT * FROM files WHERE id_parent = :id_parent AND parentTable = :parentTable";
                        $stmt = $this->pdo->prepare($query);
                        $stmt->bindParam(':id_parent', $tmp['pageProject'][$i]['id'] , \PDO::PARAM_INT);
                        $parentTable = "projectCh";
                        $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);

                            try{
                                $stmt->execute();
                                $tmp['pageProject'][$i]['filePage'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            }catch (\Exception $e){
                                $tmp['pageProject'][$i]['filePage'] = false;
                            }
                        unset($this->pdo);
                        $i++;
                    }
                }

                $dbManager = new Db_manager();
                $this->pdo = $dbManager->getConnection();

                $query ="SELECT * FROM files WHERE id_parent = :id_parent AND parentTable = :parentTable";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':id_parent', $row['id'] , \PDO::PARAM_INT);
                $parentTable = "projectCh";
                $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);

                try{
                    $stmt->execute();
                    $tmp['filesProject'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch (\Exception $e){
                    $tmp['filesProject'] = false;
                }
                unset($this->pdo);

                $tab[] = $tmp;
            }
        }
        else {
            $tab = false;
        }
        return $tab;
      }

      public function getById($id) {

        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();

        $query ="SELECT * FROM projectCh WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id , \PDO::PARAM_INT);
        try{
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (\Exception $e){
            $result = false;
        }
        unset($this->pdo);

        if ($result) {
            
            $tab = array();
            $tmp = array();
            foreach($result as $row){
                $tmp['id'] = $row['id'];
                $tmp['name'] = $row['name']; 
                $tmp['firstname'] = $row['firstname'];
                $tmp['country'] = $row['country'];
                $tmp['adress'] = $row['adress'];
                $tmp['cp'] = $row['cp'];
                $tmp['lat'] = $row['lat'];
                $tmp['lng'] = $row['lng'];
                $tmp['statusLegal'] = $row['statusLegal'];
                $tmp['denomination'] = $row['denomination'];
                $tmp['presentation'] = $row['presentation'];
                $tmp['typeApp'] = $row['typeApp'];
                $tmp['contextProject'] = $row['contextProject'];
                $tmp['objectifProject'] = $row['objectifProject'];
                $tmp['constraintProject'] = $row['constraintProject'];
                $tmp['usersProject'] = $row['usersProject'];
                $tmp['descriptionProject'] = $row['descriptionProject'];
                $tmp['language'] = $row['language'];
                $tmp['multiLanguage'] = $row['multiLanguage'];
                $tmp['traduction'] = $row['traduction'];
                $tmp['stat'] = $row['stat'];
                $tmp['dateEndProjectBool'] = $row['dateEndProjectBool'];
                $tmp['dateEndProject'] = $row['dateEndProject'];
                $tmp['maintenance'] = $row['maintenance'];
                $tmp['nameField'] = $row['nameField'];
                $tmp['accomodation'] = $row['accomodation'];
                $tmp['security'] = $row['security'];
                $tmp['technology'] = $row['technology'];
                $tmp['bdd'] = $row['bdd'];
                $tmp['designBool'] = $row['designBool'];
                $tmp['infoDesign'] = $row['infoDesign'];
                $tmp['budget'] = $row['budget'];
                $tmp['billing'] = $row['billing'];
                $tmp['answer'] = $row['answer'];
                $tmp['email'] = $row['email'];
                $tmp['tel'] = $row['tel'];
                $tmp['preference_answer'] = $row['preference_answer'];
                $tmp['start_preference_answer'] = $row['start_preference_answer'];
                $tmp['end_preference_answer'] = $row['end_preference_answer'];
                $tmp['quotation'] = $row['quotation'];
                $tmp['registration'] = $row['registration'];
                $tmp['upgrade'] = $row['upgrade'];
                
                $dbManager = new Db_manager();
                $this->pdo = $dbManager->getConnection();

                $query ="SELECT * FROM fonctionnalityProjectCh WHERE id_parent = :id_parent AND parentTable = :parentTable";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':id_parent', $id , \PDO::PARAM_INT);
                $parentTable = "projectCh";
                $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);

                try{
                    $stmt->execute();
                    $tmp['fonctionnalityProject'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch (\Exception $e){
                    $tmp['fonctionnalityProject'] = false;
                }
                unset($this->pdo);

                $dbManager = new Db_manager();
                $this->pdo = $dbManager->getConnection();

                $query ="SELECT * FROM pageProjectCh WHERE id_parent = :id_parent";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':id_parent', $id , \PDO::PARAM_INT);

                try{
                    $stmt->execute();
                    $tmp['pageProject'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch (\Exception $e){
                    $tmp['pageProject'] = false;
                }
                unset($this->pdo);

                if ($tmp['pageProject']) {
                    $i = 0;
                    while ($i < count($tmp['pageProject'])) {
                        $dbManager = new Db_manager();
                        $this->pdo = $dbManager->getConnection();
            
                        $query ="SELECT * FROM fonctionnalityProjectCh WHERE id_parent = :id_parent AND parentTable = :parentTable";
                        $stmt = $this->pdo->prepare($query);
                        $stmt->bindParam(':id_parent', $tmp['pageProject'][$i]['id'] , \PDO::PARAM_INT);
                        $parentTable = "pageProjectCh";
                        $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);
            
                            try{
                                $stmt->execute();
                                $tmp['pageProject'][$i]['fonctionnalityPage'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            }catch (\Exception $e){
                                $tmp['pageProject'][$i]['fonctionnalityPage'] = false;
                            }             
                        unset($this->pdo);
                        $dbManager = new Db_manager();
                        $this->pdo = $dbManager->getConnection();

                        $query ="SELECT * FROM files WHERE id_parent = :id_parent AND parentTable = :parentTable";
                        $stmt = $this->pdo->prepare($query);
                        $stmt->bindParam(':id_parent', $tmp['pageProject'][$i]['id'] , \PDO::PARAM_INT);
                        $parentTable = "projectCh";
                        $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);

                            try{
                                $stmt->execute();
                                $tmp['pageProject'][$i]['filePage'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            }catch (\Exception $e){
                                $tmp['pageProject'][$i]['filePage'] = false;
                            }
                        unset($this->pdo);
                        $i++;
                    }
                }

                $dbManager = new Db_manager();
                $this->pdo = $dbManager->getConnection();

                $query ="SELECT * FROM files WHERE id_parent = :id_parent AND parentTable = :parentTable";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':id_parent', $id , \PDO::PARAM_INT);
                $parentTable = "projectCh";
                $stmt->bindParam(':parentTable', $parentTable , \PDO::PARAM_STR);

                try{
                    $stmt->execute();
                    $tmp['filesProject'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch (\Exception $e){
                    $tmp['filesProject'] = false;
                }
                unset($this->pdo);

                $tab[] = $tmp;
            }
        }
        else {
            $tab = false;
        }
        return $tab;
      }

/*
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
*/
}
