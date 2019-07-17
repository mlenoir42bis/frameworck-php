<?php

class Profil_manager {
    protected $pdo;

        public function insert($profil){
          $dbManager = new Db_manager();
          $this->pdo = $dbManager->getConnection();

            $query = "INSERT INTO profil
            (name, profession, titleBio, bio, avatar)
             values
            (:name, :profession, :titleBio, :bio, :avatar)";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':name', $profil->getName() , \PDO::PARAM_STR);
            $stmt->bindParam(':profession', $profil->getProfession() , \PDO::PARAM_STR);
            $stmt->bindParam(':titleBio', $profil->getTitleBio() , \PDO::PARAM_STR);
            $stmt->bindParam(':bio', $profil->getBio() , \PDO::PARAM_STR);
            $stmt->bindParam(':avatar', $profil->getAvatar() , \PDO::PARAM_STR);

            try{
                $stmt->execute();
                unset($this->pdo);
            }catch (\Exception $e){
                return false;
            }

            return true;
        }

        public function updateWithAvatar($profil){
          $dbManager = new Db_manager();
          $this->pdo = $dbManager->getConnection();

            $query="UPDATE profil SET name=:name, profession=:profession, titleBio=:titleBio, bio=:bio, avatar=:avatar WHERE id=:id";

            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':name', $profil->getName() , \PDO::PARAM_STR);
            $stmt->bindParam(':profession', $profil->getProfession() , \PDO::PARAM_STR);
            $stmt->bindParam(':titleBio', $profil->getTitleBio() , \PDO::PARAM_STR);
            $stmt->bindParam(':bio', $profil->getBio() , \PDO::PARAM_STR);
            $stmt->bindParam(':avatar', $profil->getAvatar() , \PDO::PARAM_STR);
            $stmt->bindParam(':id', $profil->getId() , \PDO::PARAM_INT);

            try{
                $stmt->execute();
                unset($this->pdo);
            }catch (\Exception $e){
                return false;
            }

            return true;
        }

        public function update($profil){
          $dbManager = new Db_manager();
          $this->pdo = $dbManager->getConnection();

            $query="UPDATE profil SET name=:name, profession=:profession, titleBio=:titleBio, bio=:bio WHERE id=:id";

            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':name', $profil->getName() , \PDO::PARAM_STR);
            $stmt->bindParam(':profession', $profil->getProfession() , \PDO::PARAM_STR);
            $stmt->bindParam(':titleBio', $profil->getTitleBio() , \PDO::PARAM_STR);
            $stmt->bindParam(':bio', $profil->getBio() , \PDO::PARAM_STR);
            $stmt->bindParam(':id', $profil->getId() , \PDO::PARAM_INT);

            try{
                $stmt->execute();
                unset($this->pdo);
            }catch (\Exception $e){
                return false;
            }

            return true;
        }

        public function updateResume($resume, $id){
          $dbManager = new Db_manager();
          $this->pdo = $dbManager->getConnection();

            $query="UPDATE profil SET resume=:resume WHERE id=:id";

            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':resume', $resume , \PDO::PARAM_STR);
            $stmt->bindParam(':id', $id , \PDO::PARAM_INT);

            try{
                $stmt->execute();
                unset($this->pdo);
            }catch (\Exception $e){
                return false;
            }

            return true;
        }

        public function delete($profil){
          $dbManager = new Db_manager();
          $this->pdo = $dbManager->getConnection();

            $query="DELETE FROM profil WHERE id=:id";
            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':id', $profil->getId() , \PDO::PARAM_INT);

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

            $query ="SELECT * FROM profil";
            $result = $this->pdo->query($query);

            $tab = array();
            $tmp = array();
            foreach($result as $row){
                $tmp['id'] = $row['id'];
                $tmp['name'] = $row['name'];
                $tmp['profession'] = $row['profession'];
                $tmp['titleBio'] = $row['titleBio'];
                $tmp['biographie'] = $row['bio'];
                $tmp['avatar'] = $row['avatar'];
                $tmp['resume'] = $row['resume'];
                $tab[] = $tmp;
            }

            unset($this->pdo);
            return $tab;
        }
}
