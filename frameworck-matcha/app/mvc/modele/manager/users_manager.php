<?php

/**
 *
 *
 * @author marceau
 */

class Users_manager {
    protected $pdo;

    public function __construct(){
        $dbManager = new Db_manager();
        $this->pdo = $dbManager->getConnection();
    }

    public function insert($data){

            $query = "INSERT INTO users
            (name, firstname , email, password, u_key, status)
            VALUES
            (:name, :firstname , :email, :password, :u_key, 0)";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':name', $data->getName(), \PDO::PARAM_STR);
            $stmt->bindParam(':firstname', $data->getFirstname(), \PDO::PARAM_STR);
            $stmt->bindParam(':email', $data->getEmail(), \PDO::PARAM_STR);
            $stmt->bindParam(':password', $data->getPassword(), \PDO::PARAM_STR);
            $stmt->bindParam(':u_key', $data->getU_key(), \PDO::PARAM_STR);
            try{
                $stmt->execute();
            }catch (\Exception $e){
                return false;
            }
            return true;
    }

  public function emailExist($email){
      if(!isset($email) || $email==""){
          return false;
      }

      $query = "SELECT * FROM users WHERE email = :email";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
      try{
          $stmt->execute();
      }catch (\Exception $e){
          return false;
      }
      if($stmt->rowCount()>0){
          return true;
      }

  return false;
  }

  public function emailExistWithoutId($email, $id){
      if(!isset($email) || $email=="" || !isset($id) || $id==""){
          return false;
      }

      $query = "SELECT * FROM users WHERE email=:email AND id!=:id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
      $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
      try{
          $stmt->execute();
      }catch (\Exception $e){
          return false;
      }
      if($stmt->rowCount()>0){
          return true;
      }

  return false;
  }

  public function updatePasswordUserByEmail($email, $password){

      $query="UPDATE users SET password=:password WHERE email=:email";

      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':password', $password, \PDO::PARAM_STR);
      $stmt->bindParam(':email',$email, \PDO::PARAM_STR);
      try{
          $stmt->execute();
      }catch (\Exception $e){
          return false;
      }
      return true;
  }

  public function ukeyExist($ukey){
    if(!isset($ukey) || $ukey==""){
        return false;
    }
    $query ="SELECT * FROM users WHERE u_key=:ukey";
    $stmt=$this->pdo->prepare($query);
    $stmt->bindParam(":ukey", $ukey, \PDO::PARAM_STR);
    try{
        $stmt->execute();
    }catch (\Exception $e){
        return false;
    }
    if($stmt->rowCount()!=1)
    {
      return false;
    }
    $result = $stmt->fetch();
    return $result;
  }

  public function updateStatus($ukey, $status){
    if(!isset($ukey) || $ukey=="" || !isset($status) || $status==""){
        return false;
    }

    $query="UPDATE users SET status=:status WHERE u_key=:ukey";
    $stmt=$this->pdo->prepare($query);
    $stmt->bindParam(':status', $status, \PDO::PARAM_STR);
    $stmt->bindParam(':ukey',$ukey, \PDO::PARAM_STR);
    try{
        $stmt->execute();
    }catch (\Exception $e){
        return false;
    }
  }

  public function update($id, $name, $firstname, $email){
    if(!isset($id) || $id=="" || !isset($name) || $name=="" || !isset($firstname) || $firstname=="" || !isset($email) || $email==""){
        return false;
    }
    $query="UPDATE users SET name=:name,firstname=:firstname,email=:email WHERE id=:id";
    $stmt=$this->pdo->prepare($query);
    $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $firstname, \PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
    $stmt->bindParam(':id',$id, \PDO::PARAM_INT);
    try{
        $stmt->execute();
    }catch (\Exception $e){
        return false;
    }
    return true;
  }

  public function validation($email, $password){
      if(!isset($email) || $email=="" || !isset($password) || $password=="")
      {
          return false;
      }
      $query ="SELECT * FROM users WHERE email=:email";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
      try{
          $stmt->execute();
      }catch (\Exception $e){
        return false;
        die();
      }
      if($stmt->rowCount()!=1)
      {
        return false;
        die();
      }
      else
      {
        $result = $stmt->fetch();
        if ($result['status'] == 0)
        {
          return false;
          die();
        }

        $id = $result['id'];
        $email = $result['email'];
        $name = $result['name'];
        $firstname = $result['firstname'];
        $hash = $result['password'];
        $uKey = $result['u_key'];
        $status = $result['status'];

        if (password_verify($password, $hash)) {
          $sessionManager = new Session_manager();
          $sessionManager->Z45THYUpOp4POK67 = true;
          $sessionManager->is_loged = true;
          $sessionManager->id = $id;
          $sessionManager->email = $email;
          $sessionManager->name = $name;
          $sessionManager->firstname = $firstname;
          $sessionManager->uKey = $uKey;
          $sessionManager->status = $status;
          return true;
        } else {
          return false;
        }
        return true;
      }
  }

  public function selectById($id){
      if(!isset($id) || $id==""){
          return false;
      }

      $query ="SELECT * FROM users WHERE id=:id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
      try {
          $stmt->execute();
      }catch (\Exception $e) {
        return false;
        die();
      }
      if($stmt->rowCount()!=1) {
        return false;
        die();
      }
      else {
        $result = $stmt->fetch();
        return $result;
      }
  }

  public function selectByIdJoinProfil($id){
      if(!isset($id) || $id==""){
          return false;
      }

      $query ="SELECT * from users u JOIN profil p where u.id=:id AND p.id_user=:id_user";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
      $stmt->bindParam(":id_user", $id, \PDO::PARAM_INT);
      try {
          $stmt->execute();
      }catch (\Exception $e) {
        return false;
        die();
      }
      if($stmt->rowCount()!=1) {
        return false;
        die();
      }
      else {
        $result = $stmt->fetch();
        return $result;
      }
  }

  public function setUserProfilGeoById($id){
    if(!isset($id) || $id==""){
        return false;
    }
    $query ="SELECT * FROM users u JOIN profil p on u.id = p.id_user JOIN geolocation g on u.id = g.id_user WHERE u.id = :id";
    $stmt=$this->pdo->prepare($query);
    $stmt->bindParam(":id", $id, \PDO::PARAM_STR);
    try{
        $stmt->execute();
    }catch (\Exception $e){
        return false;
    }
    if($stmt->rowCount()!=1)
    {
      return false;
    }
    $result = $stmt->fetch();
    return $result;
  }

  public function getUserOnPosInDist($id, $lat, $lng, $dist){
      if(!isset($id) || $id=="" || !isset($lat) || $lat=="" || !isset($lng) || $lng=="" || !isset($dist) || $dist==""){
          return false;
      }

      $query ="SELECT * FROM geolocation G WHERE
      (6366*acos(cos(radians($lat))*cos(radians(G.lat))*cos(radians($lng) - radians(G.lng))+sin(radians($lat))*sin(radians(G.lat)))) < $dist
      AND id_user != $id
      LIMIT 20";
      $result = $this->pdo->query($query);

      $tmp = array();
      foreach($result as $row){
          $tmp[] = $row['id_user'];
      }

      return $tmp;
  }

  public function getUserOnPosInDistBySexe($id, $lat, $lng, $dist, $sexe, $orientation){
      if(!isset($id) || $id=="" || !isset($lat) || $lat=="" || !isset($lng) || $lng=="" || !isset($dist) || $dist==""  || !isset($sexe) || $sexe==""  || !isset($orientation) || $orientation==""){
          return false;
      }

      $query ="SELECT g.id_user FROM geolocation g JOIN profil p on g.id_user = p.id_user
      WHERE
      (6366*acos(cos(radians($lat))*cos(radians(g.lat))*cos(radians($lng) - radians(g.lng))+sin(radians($lat))*sin(radians(g.lat)))) < $dist
      AND g.id_user != $id
      AND p.sexe = '$sexe'
      AND (p.orientation = '$orientation' OR p.orientation = 'Bisexuelle')
      LIMIT 20";
      $result = $this->pdo->query($query);


      $tmp = array();
      foreach($result as $row){
          $tmp[] = $row['id_user'];
      }

      return $tmp;
  }

  public function getUserOnPosWithFilterBySexe($id, $lat, $lng, $dist, $sexe, $orientation, $minAges, $maxAges, $minSizes, $maxSizes, $minHtag, $maxHtag, $offset){
      if(!isset($id) || $id=="" || !isset($lat) || $lat=="" || !isset($lng) || $lng=="" || !isset($dist) || $dist==""  || !isset($sexe) || $sexe==""  || !isset($orientation) || $orientation==""){
          return false;
      }
      if(!isset($minAges) || $minAges=="" || !isset($maxAges) || $maxAges=="" || !isset($minSizes) || $minSizes=="" || !isset($maxSizes) || $maxSizes=="" || !isset($minHtag) || $minHtag=="" || !isset($maxHtag) || $maxHtag==""){
          return false;
      }
      if(!isset($offset) || $offset=="") {
          return false;
      }
      $query ="SELECT g.id_user FROM geolocation g JOIN profil p on g.id_user = p.id_user
      WHERE
      (6366*acos(cos(radians($lat))*cos(radians(g.lat))*cos(radians($lng) - radians(g.lng))+sin(radians($lat))*sin(radians(g.lat)))) < $dist
      AND g.id_user != $id
      AND p.sexe = '$sexe'
      AND (p.orientation = '$orientation' OR p.orientation = 'Bisexuelle')
      AND (p.ages BETWEEN '$minAges' AND '$maxAges')
      AND (p.sizes BETWEEN '$minSizes' AND '$maxSizes')
      AND (
        (SELECT count(*) FROM htag h1 LEFT JOIN htag h2 ON h1.name = h2.name where h1.id_user != h2.id_user AND h1.id_user = g.id_user)
        BETWEEN '$minHtag' AND '$maxHtag'
      )
      LIMIT 20 OFFSET $offset";
      $result = $this->pdo->query($query);


      $tmp = array();
      foreach($result as $row){
          $tmp[] = $row['id_user'];
      }

      return $tmp;
  }

  public function getUserOnPosWithFilter($id, $lat, $lng, $dist, $minAges, $maxAges, $minSizes, $maxSizes, $minHtag, $maxHtag, $offset){
      if(!isset($id) || $id=="" || !isset($lat) || $lat=="" || !isset($lng) || $lng=="" || !isset($dist) || $dist==""){
          return false;
      }
      if(!isset($minAges) || $minAges=="" || !isset($maxAges) || $maxAges=="" || !isset($minSizes) || $minSizes=="" || !isset($maxSizes) || $maxSizes=="" || !isset($minHtag) || $minHtag=="" || !isset($maxHtag) || $maxHtag==""){
          return false;
      }
      if(!isset($offset) || $offset=="") {
          return false;
      }
      $query ="SELECT * FROM geolocation G WHERE
      (6366*acos(cos(radians($lat))*cos(radians(G.lat))*cos(radians($lng) - radians(G.lng))+sin(radians($lat))*sin(radians(G.lat)))) < $dist
      AND id_user != $id
      AND (p.ages BETWEEN '$minAges' AND '$maxAges')
      AND (p.sizes BETWEEN '$minSizes' AND '$maxSizes')
      AND (
        (SELECT count(*) FROM htag h1 LEFT JOIN htag h2 ON h1.name = h2.name where h1.id_user != h2.id_user AND h1.id_user = G.id_user)
        BETWEEN '$minHtag' AND '$maxHtag'
      )
      LIMIT 20 OFFSET $offset";
      $result = $this->pdo->query($query);

      $tmp = array();
      foreach($result as $row){
          $tmp[] = $row['id_user'];
      }

      return $tmp;
  }
}
